<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/joomla/">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/phieu-danh-gia">Đánh giá viên chức</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/profile">Profile(GV)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/van-ban">Quản lý văn bản</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/joomla/lichcongtac">Quản lý lịch khoa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/tra-cuu">Bài báo, nghiên cứu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" <?php echo isset($_SESSION['tokenId']) ? "style='display:none;'" : "" ?> href="http://localhost/joomla/login-system">Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/login-system/token.php">Token</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" <?php echo !isset($_SESSION['tokenId']) ? "style='display:none;'" : "" ?> href="http://localhost/joomla/login-system/token.php?resetToken=1">Log Out</a>
            </li>
        </ul>
    </div>
</nav>