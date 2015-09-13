<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">UTOPIA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::route('getLedgerReport') }}">Ledger Report</a></li>
        <li><a href="{{ URL::route('getAdminTrialBalance') }}">Trial Balance</a></li>
        <li><a href="{{ URL::route('getAdminPartyReport') }}">Party Report</a></li>
        <li><a href="{{ URL::route('getViewTransaction') }}">Transaction</a></li>
        <li><a href="{{ URL::route('getDeleteUser') }}">Delete User</a></li>
        <li><a href="{{ URL::route('getChangePassword') }}">Change Password</a></li>
        <li><a href="{{ URL::route('getLogout') }}">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>