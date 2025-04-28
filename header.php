<?php
$file_css="./css/custom/styles.css";
$filemtime_css = filemtime($file_css);
$final_css = $file_css."?".$filemtime_css;

$file_js="./js/custom/script.js";
$filemtime_js = filemtime($file_js);
$final_js = $file_js."?".$filemtime_js;
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="description" content="<?php echo $traduccion['descripcion'] ?>">
<meta property="og:title" content="Representaciones JCE">
<meta property="og:description" content="<?php echo $traduccion['descripcion'] ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="./images/og-image.jpg">
<meta property="og:image" content="./images/og-image.jpg.png<?php echo "?".$filemtime_css; ?>">
<meta property="og:url" content="https://www.representacionesjce.cl/">
<meta property="og:type" content="website">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="article:author" content="Representaciones JCE">
<meta property="article:published_time" content="2024-10-14T00:00:00Z">
<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="./favicon.png" type="image/png">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="./css/vendor/fontawesome/all.min.css">
<link rel="stylesheet" href="./css/vendor/liquid/lqd-essentials.min.css">
<link rel="stylesheet" href="./css/vendor/liquid/theme.min.css">
<link rel="stylesheet" href="./css/vendor/liquid/utility.min.css">
<link rel="stylesheet" href="./css/vendor/theme/base.css">
<link rel="stylesheet" href="./css/vendor/theme/company.css">
<link rel="stylesheet" href="<?php echo $final_css; ?>">
