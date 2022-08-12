-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 12, 2022 lúc 06:11 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `joomla`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `BoMon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenBoMon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`BoMon`, `TenBoMon`) VALUES
('cntt', 'Bộ môn Công nghệ thông tin'),
('httt', 'Bộ môn Hệ thống thông tin'),
('khmt', 'Bộ môn Khoa học máy tính'),
('ktpm', 'Bộ môn Kỹ thuật phần mềm'),
('mmt', 'Bộ môn Mạng máy tính và truyền thông'),
('thud', 'Bộ môn Tin học ứng dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manage_post`
--

CREATE TABLE `manage_post` (
  `STT` int(20) NOT NULL,
  `MaCB` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenGiangVien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BoMon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiangVienThamGia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaoTrinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BaiBaoKhoaHoc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamXuatBan` int(20) NOT NULL,
  `TrangDongGop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manage_post`
--

INSERT INTO `manage_post` (`STT`, `MaCB`, `TenGiangVien`, `BoMon`, `GiangVienThamGia`, `GiaoTrinh`, `BaiBaoKhoaHoc`, `NamXuatBan`, `TrangDongGop`) VALUES
(1, 'dtnghi', 'Do Thanh Nghi', 'mmt', 'Phạm Thế Phi, Nguyễn Hữu Hòa, Phạm Nguyên Khang', '', 'Visual Classification of Intangible Cultural Heritage Images in the Mekong Delta.Chapter 4 in Data Analytics for Cultural Heritage, Springer.', 2021, '71-89'),
(2, 'dtnghi', 'Do Thanh Nghi', 'mmt', '', '', 'Training Neural Networks on Top of Support Vector Machine Models for Classifying Fingerprint Images. in SN Computer Science, Vol.2(5), Springer', 2021, ''),
(3, 'dtnghi', 'Do Thanh Nghi', 'mmt', '', '', 'Automatic Learning Algorithms for Local Support Vector Machines. in SN Computer Science, Vol.1(1), Springer', 2021, ''),
(4, 'tmtan', 'Tran Minh Tan', 'cntt', 'Nguyễn Văn Linh, Trần Thanh Điện, Lưu Trùng Dương', '', 'MỘT HƯỚNG TIẾP CẬN SỬ DỤNG MÃ NGUỒN MỞ MOODLE HỖ TRỢ GIẢNG DẠY VÀ ĐÁNH GIÁ TẠI TRƯỜNG ĐẠI HỌC CẦN THƠ. Tạp chí Khoa học Trường Đại học Cần Thơ.', 2014, '62-71'),
(5, 'tmtuan', 'Thai Minh Tuan', 'cntt', 'Hsu-Tung Chien, Yuan-Cheng Lai, Ying-Dar Lin.', '', 'WORKLOAD AND CAPACITY OPTIMIZATION FOR CLOUD-EDGE COMPUTING SYSTEMS WITH VERTICAL AND HORIZONTAL OFFLOADING. IEEE Transactions on Network and Service Management.', 2019, ''),
(6, 'dtnghi', 'Do Thanh Nghi', 'mmt', '', 'Lập Trình Web', '', 2016, ''),
(7, 'vhtram', 'Vo Huynh Tram', 'ktpm', '', 'Công nghệ thông tin trong hỗ trợ ra quyết định về giáo dục, nông nghiệp, thủy sản và môi trường vùng Đồng bằng sông Cửu Long', '', 2016, ''),
(8, 'vhtram', 'Vo Huynh Tram', 'ktpm', '', 'Quản lý dự án phần mềm', '', 2016, ''),
(9, 'tnmthu', 'Tran Nguyen Minh Thu', 'khmt', 'Đỗ Thanh Nghị, Bùi Lê Diễm', '', 'DECISION TREES USING LOCAL SUPPORT VECTOR REGRESSION MODELS FOR LARGE DATASETS. Journal of Information & Telecommunication', 2019, '1-19'),
(10, 'tnmthu', 'Tran Nguyen Minh Thu', 'khmt', 'Đỗ Thanh Nghị, Bùi Lê Diễm, Yong-Gi Kim', '', 'DECISION TREE USING LOCAL SUPPORT VECTOR REGRESSION FOR LARGE DATASETS. Intelligent Information and Database Systems.', 2018, '255-265'),
(11, 'pnkhang', 'Pham Nguyen Khang', 'khmt', '', 'Nguyên lý máy học', '', 2016, ''),
(12, 'tmtuan', 'Thai Minh Tuan', 'cntt', '', 'Nguyên lý hệ quản trị cơ sở dữ liệu', '', 2018, ''),
(13, 'tmtan', 'Tran Minh Tan', 'cntt', '', 'Lập trình ứng dụng mạng', '', 2014, ''),
(14, 'tmtan', 'Tran Minh Tan', 'cntt', 'Nguyễn Văn Linh, Trần Thanh Điện, Lưu Trùng Dương', '', 'MỘT HƯỚNG TIẾP CẬN SỬ DỤNG MÃ NGUỒN MỞ MOODLE HỖ TRỢ GIẢNG DẠY VÀ ĐÁNH GIÁ TẠI TRƯỜNG ĐẠI HỌC CẦN THƠ. Tạp chí Khoa học Trường Đại học Cần Thơ.', 2014, '62-71'),
(15, 'pnkhang', 'Pham Nguyen Khang', 'khmt', '', 'Ứng dụng phương tiện kỹ thuật trong dạy học đại học', '', 2020, ''),
(16, 'pnkhang', 'Pham Nguyen Khang', 'khmt', '', 'Trí tuệ nhân tạo', '', 2014, ''),
(17, 'pnkhang', 'Pham Nguyen Khang', 'khmt', '', 'Lập trình ứng dụng mạng với Python', '', 2014, ''),
(18, 'pnkhang', 'Pham Nguyen Khang', 'khmt', 'Phạm Thế Phi, Đỗ Thanh Nghị', '', 'NGHIÊN CỨU ỨNG DỤNG KỸ THUẬT THEO DÕI ĐỐI TƯỢNG XÂY DỰNG HỆ THỐNG CAMERA GIÁM SÁT THÔNG MINH. Tạp chí Khoa học Trường Đại học Cần Thơ', 2017, '44-52'),
(19, 'pnkhang', 'Pham Nguyen Khang', 'khmt', 'Đỗ Thanh Nghị, Trần Nguyễn Minh Thư', '', 'ĐIỂM DANH BẰNG MẶT NGƯỜI VỚI ĐẶC TRƯNG GIST VÀ MÁY HỌC VÉC-TƠ HỖ TRỢ. FAIR 2017 Đà Nẵng.', 2017, '156-164'),
(20, 'ptphi', 'Pham The Phi', 'cntt', 'Trần Minh Tân, Đỗ Thanh Nghị, Trần Nguyễn Minh Thư', '', 'COMBINING SUPPORT VECTOR MACHINES FOR CLASSIFYING FINGERPRINT IMAGES. Future Data and Security Engineering. Tran Khanh DangJosef KüngMakoto TakizawaTai M. Chung', 2020, '399-410'),
(21, 'ptphi', 'Pham The Phi', 'cntt', '', 'Nền tảng Công nghệ thông tin', '', 2016, ''),
(23, 'ptphi', 'Pham The Phi', 'cntt', '', 'Nguyên lý Hệ quản trị cơ sở dữ liệu', '', 2014, ''),
(26, 'ptphi', 'Pham The Phi', 'cntt', 'Do Thanh Nghi', '', 'ỨNG DỤNG KỸ THUẬT ĐỊNH DANH TỪ DỮ LIỆU VIDEO VÀO VIỆC NHẬN DẠNG CON NGƯỜI, HÀNH ĐỘNG VÀ ĐỊA ĐIỂM XUẤT HIỆN.', 2016, 'Nghiên cứu cơ bản và ứng dụng Công nghệ thông tin FAIR, ĐH. Cần Thơ, 8/2016. 780-790.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `short_urls`
--

CREATE TABLE `short_urls` (
  `id` int(11) NOT NULL,
  `long_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `hits` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `short_urls`
--

INSERT INTO `short_urls` (`id`, `long_url`, `short_code`, `hits`, `created`) VALUES
(1, 'http://172.16.0.254/teacher-info.php?profile=nhhoa', 'nhhoa', 1, '2022-06-29 14:56:29'),
(2, 'https://www.codexworld.com/tutorials/php/', '0bfaRnj', 0, '2022-06-29 15:00:35'),
(3, 'http://172.16.0.254/teacher-info.php?profile=tmtan', 'tmtan', 5, '2022-06-29 15:14:46'),
(4, 'http://172.16.0.254/teacher-info.php?profile=lnkhang', 'lnkhang', 1, '2022-06-29 16:15:09'),
(5, 'http://192.168.1.254/teacher-info.php?profile=lnkhang', 'lnkhang', 0, '2022-07-03 05:49:14'),
(6, 'http://192.168.1.254/teacher-info.php?profile=ptphi', 'ptphi', 1, '2022-07-03 05:50:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `MaCB` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HocVi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HocVan` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChungChi` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NghienCuu` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KinhNghiem` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BaiBao` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThamGia` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`MaCB`, `HoTen`, `GioiTinh`, `NgaySinh`, `SoDienThoai`, `Email`, `DiaChi`, `HocVi`, `HocVan`, `ChungChi`, `NghienCuu`, `KinhNghiem`, `BaiBao`, `ThamGia`) VALUES
('dtnghi', 'Do Thanh Nghi', 'Male', '2022-06-09', '434625', 'dtnghi@cit.ctu.edu.vn', '3/2 Street, Ninh Kieu District, 92100-CanTho, Viet Nam\r\n', 'A/Prof. @ Dept. of Comp. Networks', 'June 2004 $ Ph.D. in Informatics $ Visualization and Support Vector Machine in Data Mining\nLINA, Laboratory for Computer Science, Nantes University, France\nThesis advisors: Prof. Henri Briand, Dr. François Poulet $$ Jul 2002 $ Master research in Informatics $ Visualization and Support Vector Machine in Data Mining\nLINA, Laboratory for Computer Science, Nantes University, France\nAdvisor: Dr. François Poulet $$ Aug 2001 $ Master in Informatics $ IFI, Francophone Institute for Computer Science Hanoi, Vietnam\nAdvisor: Dr. Philippe Massonet $$ Jul 1996 $ Engineering diploma in Informatics $ College of Information Technology, Cantho University, Vietnam\nAdvisor: Prof. Hoang Kiem', 'Nov. 2015 $ Qualification for Associate Professor (A/Prof.) $ Information Technology $$ Jan. 2010 $ Qualification for Maître de Conférences (MCF-27) $ Informatics $$ Jan. 2005 $ Qualification for Maître de Conférences (MCF-27) $ Informatics', '2001 - present $ Data mining and Knowledge discovery in databases $ Data mining with SVM and Kernel-based methods, Ensemble methods, Decision tree Information visualization in knowledge discovery in databases, Visual data mining Mining complex data: very-high-dimensional, large scale, imbalanced datasets', '2012 - 2013 $ Visiting scientist $ DECIDE, URM 6285 Lab-STICC, with Prof. Philippe Lenca, A/Prof. Sorin Moga, Telecom-Bretagne, France.\nAutomatic Configuration of Enterprise Resource Planning $$ 2008 - 2010 $ Visiting postdoc $ DECIDE, URM 6285 Lab-STICC, with Prof. Philippe Lenca, Telecom-Bretagne, France.\nDecision Trees for Classifying Very-High-Demensional and Imbalanced Data $$ 2006 - 2008 $ Visiting postdoc $ AVIZ, INRIA Saclay, with Prof. Jean-Daniel Fekete, France.\nSEVEN: Visual Analytical Project $$ 2005 - present $ Lecturer $ Computer Networks Department, Can Tho University, Vietnam.\nTeaching: Data Mining, Machine Learning, Web Programming, Linux/Open-source Softwares, Parallel Programming', ' $ Journal, book chapter $		\r\n						<br>\r\n						T-N. Do.\r\n					 	Training Neural Networks on Top of Support Vector Machine Models for Classifying Fingerprint Images. \r\n					 	in <i>SN Computer Science</i>, Vol.2(5), Springer, 2021. <img alt=\"\" src=\"images/new.gif\"><br><br>						\r\n											 						\r\n						T-N. Do, T-P. Pham, H-H. Nguyen, N-K. Pham.\r\n					 	Visual Classification of Intangible Cultural Heritage Images in the Mekong Delta. \r\n					 	Chapter 4 in <i>Data Analytics for Cultural Heritage</i>, Springer, 2021, pp.71-89. <img alt=\"\" src=\"images/new.gif\"><br><br>\r\n					 							 			 					 						\r\n						T-N. Do.\r\n					 	Automatic Learning Algorithms for Local Support Vector Machines. \r\n					 	in <i>SN Computer Science</i>, Vol.1(1), Springer, 2020. <br><br>\r\n					 	\r\n						M-T. Tran-Nguyen, L-D. Bui, T-N. Do.\r\n					 	Decision tree using local support vector regression for large datasets. \r\n					 	in <i>Journal of Information &amp; Telecommunication</i>, Vol.4(1): 17-35, Taylor &amp; Francis, 2020. <br><br>\r\n					 	\r\n						P-H. Vo, T-S. Nguyen, V-T. Huynh, T-N. Do. \r\n					 	A High capacity invertible steganography algorithm using 2-D histogram shifting with EDH. \r\n					 	Chapter 6 in the book <i>Digital Media Steganography: Principles, Algorithms, Advances</i>, ELSEVIER Inc., 2020, pp.99-122.<br><br>	\r\n					 	\r\n						P-H. Huynh, V-H. Nguyen, T-N. Do.\r\n					 	Improvements in the large p, small n classification issue. \r\n					 	in <i>SN Computer Science</i>, Vol.1(4): 1-19, Springer, 2020. <br><br>\r\n					 						 								\r\n					 	T-N. Do, F. Poulet. \r\n					 	Latent-lSVM classification of very high-dimensional and large scale multi-class datasets. \r\n					 	in <i> Concurrency and Computation: Practice and Experience</i>, Vol.31(2):e4224, Wiley, 2019. <br><br>\r\n						\r\n						T-N. Do, L-D. Bui. \r\n					 	Parallel learning algorithms of local support vector regression for dealing with large datasets. \r\n					 	in <i>The LNCS Journal Transactions on Large-Scale Data- and Knowledge-Centered Systems</i>, Vol.41:59-77, Springer, 2019. <br><br>\r\n\r\n						P-H. Huynh, V-H. Nguyen, T-N. Do.\r\n					 	Novel hybrid DCNN-SVM model for classifying RNA-Sequencing gene expression data. \r\n					 	in <i>Journal of Information &amp; Telecommunication</i>, Vol.3(4): 533-547, Taylor &amp; Francis, 2019. <br><br>\r\n						\r\n						P-H. Huynh, V-H. Nguyen, T-N. Do. \r\n					 	Enhancing gene expression classification of support vector machines with generative adversarial networks. \r\n					 	in <i>Journal of Information and Communication Convergence Engineering</i>, Vol.17(1):14-20, 2019. <br><br>\r\n						\r\n						P-H. Vo, T-S. Nguyen, V-T. Huynh and T-N. Do. \r\n						A Novel Reversible Data Hiding Scheme with  Two-Dimensional Histogram Shifting Mechanism. \r\n						in <i>International Journal of Multimedia Tools and Applications</i>, Vol.77(21): 28777-28797, Springer, 2018. <br><br>					\r\n						\r\n					 	T-N. Do, F. Poulet. \r\n					 	Parallel learning of local SVM algorithms for classifying large datasets. \r\n					 	in <i>The LNCS Journal Transactions on Large-Scale Data- and Knowledge-Centered Systems</i>, Vol.31:67-93, Springer, 2017. <br><br>\r\n						\r\n					 	T-N. Do, P. Lenca, S. Lallich. \r\n					 	Classifying Many-Class High Dimensional Fingerprint Datasets Using Random Forest of Oblique Decision Trees. \r\n					 	in <i>Vietnam Journal of Computer Science</i>, Vol.2(1): 3-12, Springer, 2015. <br><br>\r\n					 	\r\n						T-N. Do, N-K. Pham. \r\n						Handwritten Digit Recognition Using GIST Descriptors and Random Oblique Decision Trees. \r\n						in <i>Advances in Intelligent Systems and Computing</i>, Vol.341: 1-15, Springer, 2015. <br><br>\r\n						\r\n						T-N. Doan, T-N. Do, F. Poulet. \r\n						Large Scale Classifiers for Visual Classification Tasks. \r\n						in <i>International Journal of Multimedia Tools and Applications</i>, Vol.74(4): 1199-1224, Springer, 2015. <br><br>\r\n						\r\n						T-N. Do, H-A. Le-Thi. \r\n						Massive Classification with Support Vector Machines. \r\n						in <i>Transactions on Computational Collective Intelligence XVIII</i>, Springer Berlin Heidelberg, 2015, pp. 147-165. <br><br>\r\n						\r\n						T-N. Doan, T-N. Do, F. Poulet. \r\n						Classification d\'images à grande échelle avec des SVMs. \r\n						in <i>Revue Traitement du Signal</i>, Vol.31(1-2): 39-56, LAVOISIER, 2014. <br><br>\r\n\r\n						T-N. Do. \r\n						Parallel Multiclass Stochastic Gradient Descent Algorithms for Classifying Million Images with Very-High-Dimensional Signatures into Thousands Classes. \r\n						in <i>Vietnam Journal of Computer Science</i>, Vol.1(2): 107-115, Springer, 2014. <br><br>\r\n						\r\n						T-N. Doan, T-N. Do, F. Poulet. \r\n						Parallel Incremental Power Mean SVM for the Classification of Large Scale Image Datasets. \r\n						in <i>International Journal of Multimedia Information Retrieval</i>, Vol.3(2): 89-96, Springer, 2014. <br><br>\r\n						\r\n						T-N. Do, S. Lallich, N-K. Pham and P. Lenca. \r\n						Classifying very-high-dimensional data with random forests of oblique decision trees. \r\n						in <i>Advances in Knowledge Discovery and Management</i>, Studies in Computational Intelligence Vol.292: 39-55, Springer-Verlag, 2010. <br><br>\r\n						\r\n						T-N. Do, V-H. Nguyen, F. Poulet. \r\n						GPU-based parallel SVM algorithm. \r\n						in <i>Journal of Frontiers of Computer Science and Technology</i>, Vol.3(4): 368-377, 2009. <br><br>\r\n						\r\n						T-N. Do and F. Poulet. \r\n						Interval Data Mining with Kernel-based Algorithms and Visualization. \r\n						Chapter 5 in <i>Mining Complex Data for Knowledge Discovery: Advances and Applications</i>, Studies in Computational Intelligence Vol.165: 75-91, Springer-Verlag, 2009. <br><br>\r\n						\r\n						F. Poulet and T-N. Do. \r\n						Interactive Decision Tree Construction for Interval and Taxonomical data. \r\n						in <i>Visual Data Mining: Theory, Techniques and Tools for Visual Analytics</i>, Lecture Notes in Computer Science Vol.4404: 123-135, Springer-Verlag, 2008. <br><br>\r\n						\r\n						T-N. Do et J-D. Fekete. \r\n						V4Miner pour la fouille de données. \r\n						in <i>Review of Artificial Intelligence</i>, Vol.22/3-4: 503-517, 2008. <br><br>\r\n						\r\n						N-K. Pham, T-N. Do, F. Poulet et A. Morin. \r\n						Tree-view pour l\'exploration interactive des arbres de décision. \r\n						in <i>Review of Artificial Intelligence</i>, Vol.22/3-4: 473-487, 2008. <br><br>\r\n						\r\n						T-N. Do and F. Poulet. Vis-SVM : approche coopérative en fouille de données. \r\n						in <i>Numéro Spécial Visualisation et Extraction de Connaissances</i>, Revue des Nouvelles Technologies de l\'Information – Série Extraction et Gestion des Connaissances RNTI-E-7: 49-74, 2006. <br><br>\r\n						\r\n						F. Poulet and T-N. Do. \r\n						Mining Very Large Datasets with Support Vector Machine Algorithms. \r\n						in <i>Enterprise Information Systems V</i>, Kluwer Academic Publishers, 2004, pp. 177-184.											 	\r\n					 $$ $ Edited book $	\r\n					<br>			\r\n						P. Lenca, S. Lallich, T-N. Do. \r\n						QIMIE Workshop (Quality Issues, Measures of Interestingness and Evaluation of Data Mining Models). \r\n						PAKDD Workshops 2015. <br><br>					\r\n									 \r\n						F. Poulet, B. LeGrand, T-N. Do and M-A. Aufaure. \r\n						Acte de l\'Atelier Visualisation et extraction de connaissances. \r\n						9èmes Journées d\'Extraction et Gestion des Connaissances 2009. <br><br>\r\n						 										\r\n						F. Poulet, B. LeGrand, T-N. Do. \r\n						Acte de l\'Atelier Visualisation et extraction de connaissances. \r\n						8èmes Journées d\'Extraction et Gestion des Connaissances 2008. \r\n					$$ $ Technical report $ <br> J-D. Fekete, N. Elmqvist, T-N. Do, H. Goodell and N. Henry. Navigating Wikipedia with the Zoomable Adjacency Matrix Explorer. INRIA Research Report, Technical Report No. RR:00141168, 2007. <br><br> T-N. Do and F. Poulet. La catégorisation de textes. Rapport de contrat Fondation Vediorbis. ESIEA Recherche, Laval, 2004. $$ $ Thesis $ \r\n					   <br>\r\n						T-N. Do. \r\n						Visualisation et séparateurs à vaste marge en fouille de données. \r\n						Thèse de Doctorat de l\'Université de Nantes, Décembre 2004. <br><br>\r\n						\r\n						T-N. Do. \r\n						Visualisation et fouille de données. \r\n						Rapport de DEA, Université de Nantes, Juillet 2002.\r\n					', ' $ <br>Workshop Organization $ QIMIE 2015 is organized in association with the PAKDD 2015 conference, with Prof. P. Lenca, Prof. S. Lallich <br>  IEEE-RIVF 2015 International Conference on Computing and Communication Technologies, Workshop chair  <br>VisECD 2009 is organized in association with the EGC 2009 conference, with Prof. F. Poulet, Prof. B. Legrand, Prof. M-A. Aufaure <br> VisECD 2008 is organized in association with the EGC 2008 conference, with Prof. F. Poulet, Prof. B. Legrand $$ $ Program committee member, reviewer $ <div class=\"info\">\r\n					 <br>	\r\n					 	ACML 2017-2019, The Asian Conference on Machine Learning <br>						\r\n					    <br>\r\n					    IJCAI 2019, The Intl Joint Conferences on Artificial Intelligence <br><br>\r\n					 	KDIR 2014-2022, The Intl Conf. on Knowledge Discovery and Information Retrieval<br><br>\r\n					 	MCO/ICCSAMA 2014,2015,2021, The Intl Conf. on Computer Science, Applied Math. and Appl.<br><br>\r\n					 	FDSE 2014-2022, The Intl Conf. on Future Data and Security Engineering <br><br>\r\n					 	SoICT 2018, The Intl Symposium on Information and Communication Technology <br><br>	\r\n					 	MAPR 2018-2019, The Intl Conf. on Multimedia Analysis and Pattern Recognition <br><br>							\r\n					 	VAST 2013, The IEEE Conf. on Visual Analytics Science and Technology<br><br>\r\n					 	DS 2012, The Intl Conf. on Discovery Science 2012<br><br>\r\n					 	ACIIDS 2010-2016, The Asian Conf. on Intelligent Information and Database Systems<br><br>\r\n					  	ICTACS 2010-2011, The Intl Conf. on Theories and Applications of Computer Science <br><br>\r\n					 	CIE39, The Intl Conf. on Computers &amp; Industrial Engineering 2009 <br><br>\r\n					 	DMIN 2008-2010, The Intl Conf. on Data Mining<br><br>\r\n					 	VIEW 2006-2007, Visual Information Expert Workshop<br><br>\r\n					 	AusDM 2004, The Australasian Data Mining Conference 2004<br><br>\r\n					 	ASMDA 2005, the Intl Symposium on Applied Stochastic Models and Data Analysis 2005<br><br>\r\n					 	Atelier Qualité des Données et des Connaissances 2008-2011 <br><br>\r\n					 	Atelier Visualisation et extraction de connaissances 2005-2009<br><br>\r\n					 	Journal of Intelligent Information Systems 2013<br><br>\r\n					 	Journal of Experimental Algorithmics 2009<br><br>\r\n					 	Advances in Knowledge Discovery and Management 2009<br><br>\r\n					 	Pattern Recognition Elsevier 2008<br><br>\r\n					 	RNTI, Revue des Nouvelles Technologies de l\'Information, Cépaduès Editions, 2006-2008<br><br>\r\n					 	MCO 2008, The Intl Conf. on Modelling, Computation and Optimization in Information Systems and Management Sciences 2008<br><br>\r\n					 	I3, Information-Interaction–Intelligence, Cépaduès Editions, 2006<br><br>\r\n					 	ICTFIT 2008-2012, The National conference in computer science					 	\r\n					 </div>$$ $ Invited seminars $ <div class=\"info\">\r\n					   <br>\r\n					 	FIT, University of Technology HCM, Vietnam, 03/2014 <br><br>\r\n						LITA Metz, University of Lorraine, France, 12/2012<br><br>\r\n						Faculty of Information Technology, Dong Thap University, Vietnam, 05/2011<br><br>\r\n						Faculty of Information Technology, Bac Lieu University, Vietnam, 06/2011<br><br>\r\n						An Giang University, Vietnam, 08/2010<br><br>\r\n						Software Center of Cantho University, Vietnam, 04/2005<br><br>\r\n						IRISA Rennes, France, 01/2005\r\n					 </div> $$ $ Ph.D. Advisor $ <div class=\"info\">\r\n					   <br>				 	\r\n						Phuoc-Hung Vo. steganography. Can Tho University, Vietnam, Dec/2020<br>						 \r\n					   <br>				 	\r\n						Phuoc-Hai Huynh. Gene expression classification. Can Tho University, Vietnam, Sept/2020<br>	\r\n					 </div> $$ $ Ph.D. Defense Committee $ <div class=\"info\">\r\n					   <br>				 	\r\n						Hong-Son Trang. Several approaches for solving the personal scheduling problem. University of Technology HCM, Vietnam, Jan/2022<br>						 \r\n					   <br>				 	\r\n						Thanh-Tuyen Do Thi. Vietnamese document retrieval based on semantics. University of Information Technology HCM, Vietnam, Sept/2020<br>						 \r\n					   <br>				 	\r\n						Cong-Chien Ta Duy. Building information extraction system based on computing domain ontology. University of Technology HCM, Vietnam, June/2017<br>\r\n					 <br>				 	\r\n						Thanh-Son Nguyen. Time series mining. University of Technology HCM, Vietnam, May/2014<br><br>\r\n					 	Emilien Gauthier. Evaluation du risque de maladie: conception d\'un processus et \r\n					 	d\'un système d\'information permettant la construction d\'un score de risque adapté au contexte, \r\n					 	application au cancer du sein. University of Bretagne, France, Jan/2013 	\r\n					 </div>'),
('nhqhuy', 'Nguyen Ho Quoc Huy', 'Male', '2022-06-23', '3436658', 'huyb1809128@student.ctu.edu.vn', '1, Ly Tu Trong, Can Tho', 'Student', '', '', '', '', '', ''),
('nttanh', 'Nguyen Thi Thao Anh', 'Female', '1999-11-20', '403068076', 'huyb1809128@student.ctu.edu.vn', '1, LTT', 'Student', '', '', '', '', '', ''),
('pnkhang', 'Pham Nguyen khang', 'Male', '', '', '', '', '', '', '', '', '', '', ''),
('ptphi', 'Pham The Phi', 'Male', '', '', '', '', '', '', '', '', '', '', ''),
('tmtan', 'Tran Minh Tan', 'Male', '2022-06-09', '57890054', 'tmtan@cit.ctu.edu.vn', '1, Ly Tu Trong', 'Masters', '2022- Present$Can Tho University$Director of the Center of electronics and informatics$$2009-2011$Can Tho University$Graduated Master Can Tho University of Infomatics$$1999-2003$Can Tho University$Graduated Can Tho University of Infomatics', '2011$Qualification Manage in Education$Ha Noi International University', '2019$Research Area$1 Statistics (Problems of applied statistics research in each field, each specific industry are classified into respective fields and industries)\r\n2 Computer Science\r\n3 Information Science\r\n4 Computer science and other information science (Hardware development issues under category 20206 (Computer hardware and architecture); Social aspects of computational and information science fall under category 5 - Science XH.)', '2011-Present$Senior Lecture$Can Tho University', '2011$Technology Posts$Post 1<br>Post 2', '2009$Join In$ Techical Post Can Tho University'),
('tmtuan', 'Thai Minh Tuan', 'Male', '2022-06-23', '57890054', 'tmtuan@cit.ctu.edu.vn', '1, Ly Tu Trong, Can Tho', 'Doctor of Information Technology', '1999-2003$Can Tho University$Graduated Can Tho University of Infomatics', '2011$Qualification Manage in Education$Ha Noi International University', '2019$Research Area$ Element Topic', '2011-Present$Senior Lecture$Can Tho University', '2011$Technology Posts$Element Topic', '2009$Join In$ Element Topic'),
('tnmthu', 'Tran Nguyen Minh Thu', 'Female', '', '', '', '', '', '', '', '', '', '', ''),
('vhtram', 'Vo Huynh Tram', 'Female', '', '', '', '', '', '', '', '', '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`BoMon`);

--
-- Chỉ mục cho bảng `manage_post`
--
ALTER TABLE `manage_post`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `MaCB` (`MaCB`),
  ADD KEY `BoMon` (`BoMon`);

--
-- Chỉ mục cho bảng `short_urls`
--
ALTER TABLE `short_urls`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`MaCB`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manage_post`
--
ALTER TABLE `manage_post`
  MODIFY `STT` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `short_urls`
--
ALTER TABLE `short_urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `manage_post`
--
ALTER TABLE `manage_post`
  ADD CONSTRAINT `manage_post_ibfk_1` FOREIGN KEY (`MaCB`) REFERENCES `teacher` (`MaCB`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_post_ibfk_2` FOREIGN KEY (`BoMon`) REFERENCES `bomon` (`BoMon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
