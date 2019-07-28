{{-- <div class="col-xl-6">
    <div class="copyright text-center text-xl-left text-muted">
        &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
    </div>
</div>
<div class="col-xl-6">
    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
        <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
        </li>
        <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
        </li>
        <li class="nav-item">
            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
        </li>
        <li class="nav-item">
            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
        </li>
    </ul>
</div> --}}
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

