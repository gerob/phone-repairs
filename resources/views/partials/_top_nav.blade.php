<nav class="primary-nav pull-right" role="navigation">
    <ul class="nav nav-pills">
      <li role="presentation" class=""><a href="/">Home</a></li>
      <li role="presentation"><a href="{{ route('start.order') }}">New Work Order</a></li>
      <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Reports <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li role="presentation"><a href="{{ route('orders.list') }}">All Orders</a></li>
              <li role="presentation"><a href="{{ route('inventory.required') }}">Inventory</a></li>
          </ul>
        </li>
    </ul>
</nav>
