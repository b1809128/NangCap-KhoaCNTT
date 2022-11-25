
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
                <a class="nav-link" href="http://localhost/joomla/teacher-info.php?profile=dtnghi">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/thi-dua-khen-thuong">Thi đua, khen thưởng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/van-ban">Quản lý văn bản</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/joomla/lich-cong-tac">Quản lý lịch khoa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/tra-cuu">Bài báo, nghiên cứu</a>
            </li>
	   <li class="nav-item">
                <a class="nav-link" href="http://localhost/joomla/cap-nhat">Cập nhật thông tin</a>
            </li>
	   <li class="nav-item">
	   	 <a class="nav-link" href="http://localhost/joomla/login-system/token.php">Token</a>
	   </li>
	   <li class="nav-item" <?php echo isset($_SESSION['tokenId']) ? "style='display:none;'" : "" ?>  >
    		<a class="nav-link" href="http://localhost/joomla/login-system">Đăng nhập</a>
	   </li>
	   <li class="nav-item" <?php echo !isset($_SESSION['tokenId']) ? "style='display:none;'" : "" ?> >
                <a class="nav-link"  href="http://localhost/joomla/login-system/?resetToken=1">Log Out</a>
            </li>
        </ul>
    </div>
</nav>