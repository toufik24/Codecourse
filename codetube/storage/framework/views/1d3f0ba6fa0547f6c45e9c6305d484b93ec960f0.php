<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php echo e(config('app.name', 'Laravel')); ?>

            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <form action="/search" method="get" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" name="q" class="form-control" placeholder="Search" value="<?php echo e(Request::get('q')); ?>">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                <?php else: ?>
                    <li><a href="<?php echo e(url('/upload')); ?>">Upload</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo e(url('/videos')); ?>">Your videos</a>
                                <a href="<?php echo e(url('/channel/' . $channel->slug)); ?>">Your channel</a>
                                <a href="<?php echo e(url('/channel/' . $channel->slug . '/edit')); ?>">Channel settings</a>

                                <a href="<?php echo e(url('/logout')); ?>"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>


                                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>