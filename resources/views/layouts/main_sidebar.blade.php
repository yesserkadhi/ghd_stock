<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                    <img src="{{ asset('public/assets/images/logo.png')}}" alt="logo" class="logo">
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.html">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('Role.create')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Role</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('Categorie.create')}}">
                            <i class="nc-icon nc-grid-45"></i>
                            <p>Catégories</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('Produit.create')}}">
                            <i class="nc-icon nc-tap-01"></i>
                            <p>Produits</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('Entree.create')}}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>B Entrées</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('Sortie.create')}}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>B Sorties</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>