<nav class="primary-nav pull-right" role="navigation">
    <ul class="nav nav-pills">
      <li role="presentation" class=""><a href="/">Home</a></li>
      <li role="presentation"><a href="{{ route('order.new.manufacturer') }}">New Work Order</a></li>
      <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Reports <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li role="presentation"><a href="{{ route('orders.list.all') }}">All Orders</a></li>
              <li role="presentation"><a href="{{ route('inventory.required') }}">Inventory</a></li>
          </ul>
        </li>
      <li><a href="http://www.werxparts.com/articles.asp?id=285" target="_blank">Werx Support</a></li>
    </ul>
</nav>
