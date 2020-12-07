<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            <li>
                <a href="#" id="customer-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span>Customer</span>
                </a>

                <ul>
                    <li>
                        <a href="{{ url('/customer') }}">Data Customer</a>
                    </li>
                    <li>
                        <a href="{{ url('/customer/tambah-1') }}">Tambah Customer 1</a>
                    </li>
                    <li>
                        <a href="{{ url('/customer/tambah-2') }}">Tambah Customer 2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/modul2/barcode" id="">
                    <span class="nav-link-icon">
                        <i class="fas fa-tag"></i>
                    </span>
                    <span>Cetak label</span>
                </a>
            </li>
            <li>
                <a href="/modul2/barcode_scanner" id="">
                    <span class="nav-link-icon">
                        <i class="fas fa-barcode"></i>
                    </span>
                    <span>Scanner Barcode</span>
                </a>
            </li>
            <li>
                <a href="/location" id="">
                    <span class="nav-link-icon">
                        <i class=""></i>
                    </span>
                    <span>Lokasi Toko</span>
                </a>
            </li>
            <li>
                <a href="/titikAwal" id="">
                    <span class="nav-link-icon">
                        <i class=""></i>
                    </span>
                    <span>Tambah Lokasi Toko</span>
                </a>
            </li>
            <li>
                <a href="/titikKunjungan" id="">
                    <span class="nav-link-icon">
                        <i class=""></i>
                    </span>
                    <span>Kunjungan Ke Toko</span>
                </a>
            </li>
        </ul>
    </div>
</div>