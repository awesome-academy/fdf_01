<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin - Food & Drink</title>

    {{ Html::style(asset('/layouts/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')) }}
    {{ Html::style(asset('/css/style.css')) }}
    {{ Html::style(asset('/layouts/admin/bower_components/metisMenu/dist/metisMenu.min.css')) }}
    {{ Html::style(asset('/layouts/admin/dist/css/sb-admin-2.css')) }}
    {{ Html::style(asset('/layouts/admin/bower_components/font-awesome/css/font-awesome.min.css')) }}
    {{ Html::style(asset('/layouts/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')) }}
    {{ Html::style(asset('/layouts/admin/bower_components/datatables-responsive/css/dataTables.responsive.css')) }}
    {{ Html::style(asset('https://skywalkapps.github.io/bootstrap-notifications/stylesheets/bootstrap-notifications.css')) }}

</head>

<body>

    <div id="wrapper">
    	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('layouts.admin.header')
    		@include('layouts.admin.left-bar')
    	</nav>
    		@yield('content')
    </div>

    {{ Html::script(asset('/layouts/admin/bower_components/jquery/dist/jquery.min.js')) }}
    {{ Html::script(asset('/layouts/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')) }}
    {{ Html::script(asset('/layouts/admin/bower_components/metisMenu/dist/metisMenu.min.js')) }}
    {{ Html::script(asset('/layouts/admin/dist/js/sb-admin-2.js')) }}
    {{ Html::script(asset('/layouts/admin/bower_components/datatables/media/js/jquery.dataTables.min.js')) }}
    {{ Html::script(asset('/layouts/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')) }}
    {{ Html::script(asset('/js/confirm.js')) }}
    {{ Html::script(asset('/js/ajax/productStatus.js')) }}
    {{ Html::script('messages.js') }}
    {{ Html::script('https://js.pusher.com/4.3/pusher.min.js') }}
{{--     {{ Html::script(asset('/js/pusher/script.js')) }} --}}

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <script type="text/javascript">
        var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notificationsCount     = parseInt(notificationsCountElem.data('count'));
        var notifications          = notificationsWrapper.find('ul.dropdown-menu');


        // Enable pusher logging - don't include this in production
         Pusher.logToConsole = true;

        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: 'ap1',
            encrypted: true
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('Notify');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('send-message', function(data) {
            var existingNotifications = notifications.html();
            var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
            var newNotificationHtml = `
              <li class="notification active">
                  <div class="media">
                    <div class="media-left">
                      <div class="media-object">
                        <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                      </div>
                    </div>
                    <div class="media-body">
                      <strong class="notification-title">`+data.title+`</strong>
                      <p class="notification-desc">`+data.content+`</p>
                      <div class="notification-meta">
                        <small class="timestamp">about a minute ago</small>
                      </div>
                    </div>
                  </div>
              </li>
            `;
            notifications.html(newNotificationHtml + existingNotifications);

            notificationsCount += 1;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.notif-count').text(notificationsCount);
            notificationsWrapper.show();
        });
    </script>

</body>

</html>
