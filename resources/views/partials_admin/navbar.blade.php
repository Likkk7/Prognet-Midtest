<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container">
      <ul class="navbar-nav ">
        <h4 style="color:white;"><i class="fa fa-commenting-o" aria-hidden="true"></i><b>  LAPOR!</b> </h4>
      </ul>

      <ul class="navbar-nav ms-auto">
        @auth
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <form action="{{ route('admin-logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Keluar</li></button>
              </form>
          </ul>
        @else
        @endauth
      </ul>
    </div>
  </div>
</nav>

<table width="100%" bgcolor="#DC3545" cellpadding="15">
  <tr>           
    <td align= center font style="color: white">
      <font size=5> <b>Layanan Pengaduan Online Rakyat Konoha</b></td>     
  </tr>
</table>