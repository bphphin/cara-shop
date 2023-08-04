<form action="{{ route('home.site.product.search')  }}" class="search border" method="POST">
    @csrf
    <input type="text" placeholder="Search product" name="name">
    <button class="normal me-1">Search</button>
</form>
