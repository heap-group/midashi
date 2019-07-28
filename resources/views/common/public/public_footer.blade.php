<footer class="py-5">
    <div class="container">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    <?php $date = date('Y') ?>
                    &copy; {{ $date }} <a href="{{ route('post_index') }}" class="font-weight-bold ml-1">MIDASHI</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="{{ route('post_index') }}" class="nav-link">個人情報保護方針</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('post_index') }}" class="nav-link">プライバシーポリシー</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('post_index') }}" class="nav-link">お問い合わせ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
