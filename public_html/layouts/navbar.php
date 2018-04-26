<div>
  <nav>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" 
          data-target=".navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="/">
          <img src="/images/logo.png" alt="Open Blog logo" class="logo">
        </a>
      </div>
      <div class="collapse navbar-collapse navi">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <div class="row">
              <div class="col-md-12">
                <form action="/search.php" method="POST">
                  <div class="input-group" id="adv-search">
                    <input class="form-control" type="search" 
                      placeholder="Search articles..." name="search" id="search"/>
                    <input type="hidden" value="submit"/>
                    <div class="input-group-btn">
                      <div class="btn-group" role="group">
                        <button class="btn btn-primary" type="button">
                          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </li>
          <li>
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">My Account
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu multi-level">
              <li>
                <a class="glyphicon glyphicon-log-in" href="/login.php"> Login</a>
              </li>
              <li>
                <a class="glyphicon glyphicon-user" href="/register.php"> Register</a>
              </li>
              <li>
                <a href="#">My Articles</a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li>
            <a href="/articles/create.php">Post Article</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
</div>