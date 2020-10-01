<div class="sidebar" data-color="orange" data-image="../assets/img/sidebar-5.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://cftracker.codingfork.com/" class="simple-text logo-mini">
                CF
            </a>
            <a href="http://cftracker.codingfork.com/" class="simple-text logo-normal">
                CF-Tracker
            </a>
        </div>

        <ul class="nav">
          <?php
          $session = \Config\Services::session();
          $nav_user = array(
            array(
              "text" => "Dashboard",
              "link" => "/userdashboard"
            ),
            array(
              "text" => "Task",
              "link" => "/task"
            )
          );
          $nav_admin = array(
            array(
              "text" => "Dashboard",
              "link" => "/dashboard"
            ),
            array(
              "text" => "Accounts",
              "link" => "/admin"
            ),
            array(
              "text" => "Projects",
              "link" => "/project_admin"
            ),
            array(
              "text" => "Tasks",
              "link" => "/task_admin"
            )
          );

          if ($session->get("type") == 0) {
            echo sidebar_content($nav_admin);
          }else {
            echo sidebar_content($nav_user);
          }
          ?>
        </ul>
    </div>
</div>
