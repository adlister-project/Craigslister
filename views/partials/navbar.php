<nav class="uk-navbar uk-margin-large-bottom">
    <a class="uk-navbar-brand uk-hidden-small" href="index.php">Craigs'Lists</a>
    <ul class="uk-navbar-nav uk-hidden-small">
        <li class="">
            <a href="ads.index.php">View Ads</a>
        </li>
        <li class="">
            <a href="ads.show.php">Search Ads</a>
        </li>
    </ul>
    <div class="uk-navbar-flip">
        <ul class="uk-navbar-nav">
            <?php if(Auth::check()): ?> 
            <li class="">
                <a href="users.show.php">User Profile</a>
            </li>
            <li class="">
                <a <?php Auth::logout() ?> href="index.html">Logout</a>
            </li>
            <?php else: ?>
            <li class="">
                <a href="users.show.php">Sign Up</a>
            </li>
            <li class="">
                <a href="auth.login.php">Login</a>
            </li>
            <?php endif ?>
        </ul>
    </div>

    <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
    <div class="uk-navbar-brand uk-navbar-center uk-visible-small">Craigs'Lists</div>
  </nav>
