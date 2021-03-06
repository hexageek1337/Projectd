<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='dns-prefetch' href='<?=base_url()?>'><link href='https://fonts.gstatic.com' rel='preconnect'><link href='https://www.gstatic.com' rel='preconnect'><link href='https://fonts.googleapis.com' rel='preconnect'><link href='https://ajax.googleapis.com' rel='preconnect'><link href='https://www.googletagmanager.com' rel='preconnect'><link rel="dns-prefetch" href="https://cdn.jsdelivr.net/"><link rel="dns-prefetch" href="https://cdn.datatables.net/">
<link rel="shortcut icon" href="<?=base_url('flux1on.ico')?>">
<meta name="robots" content="noindex, nofollow" />
<meta name="author" content="<?=$config->author?>">
<meta name="description" content="<?=$config->description?>"/>
<link rel="alternate" href="<?=base_url()?>" hreflang="x-default"/>
<link rel="canonical" href="<?=base_url()?>" />
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Administrator - <?=$config->title?></title>
<!-- Bootstrap & DataTables -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
<!-- Custom CSS -->
<link href="<?=base_url('assets/css/custom.min.css')?>" rel="stylesheet">
<link href="<?=base_url('assets/css/style.min.css')?>" rel="stylesheet">
</head>
<body data-spy="scroll" id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand js-scroll-trigger" href="<?=base_url('projectd')?>"><?=$config->title?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#project">Project</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#safelink">Safelink</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/logout">?</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<header class="bg-primary text-white">
	<div class="container text-center">
		<h1 class="h1">Administrator <?=$config->title?></h1>
		<p class="lead" loading="lazy">Projectd is landing page portofolio from <strong>Denny Septian Panggabean</strong> with Codeigniter 4 and Bootstrap 4</p>
	</div>
</header>