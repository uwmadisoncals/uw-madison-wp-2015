<?php
		$numofposts = 3;
		$orderofposts = "desc";
		$postformat = "list";
		$showdate = true;
		$showauthor = true;
		$showexcerpt = true;
		$filterposts = false;

		$numofposts = get_sub_field('num_of_posts');
		$orderofposts = get_sub_field('order_of_posts');
		$postformat = get_sub_field('post_format');
		$showdate = get_sub_field('show_date');
		$showauthor = get_sub_field('show_author');
		$showexcerpt = get_sub_field('show_excerpt');
		$filterposts = get_sub_field('filter_posts');



	if($filterposts) { ?>
		<div class="directoryFilter">
			<div class="searchIcon"><svg height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#929292" id="icon-111-search"><path d="M19.4271164,21.4271164 C18.0372495,22.4174803 16.3366522,23 14.5,23 C9.80557939,23 6,19.1944206 6,14.5 C6,9.80557939 9.80557939,6 14.5,6 C19.1944206,6 23,9.80557939 23,14.5 C23,16.3366522 22.4174803,18.0372495 21.4271164,19.4271164 L27.0119176,25.0119176 C27.5621186,25.5621186 27.5575313,26.4424687 27.0117185,26.9882815 L26.9882815,27.0117185 C26.4438648,27.5561352 25.5576204,27.5576204 25.0119176,27.0119176 L19.4271164,21.4271164 L19.4271164,21.4271164 Z M14.5,21 C18.0898511,21 21,18.0898511 21,14.5 C21,10.9101489 18.0898511,8 14.5,8 C10.9101489,8 8,10.9101489 8,14.5 C8,18.0898511 10.9101489,21 14.5,21 L14.5,21 Z" id="search"/></g></g></svg></div>
			<div class="searchField"><input type="text" class="<?php echo $directoryinput ?>" placeholder="Filter Posts"></div>

		</div>
	<?php }

// The Query
$the_query = new WP_Query( array( 'posts_per_page' => $numofposts, 'order' => $orderofposts ) );

// The Loop
if ( $the_query->have_posts() ) { ?>
	<div class="listPosts <?php echo $postformat; ?>">
	<?php if($postformat == "list") { ?><ul><?php } ?>
	<?php if($postformat == "timeline") { ?>
		<div class="today"><?php echo date("l F jS, Y"); ?></div>
	<ul class="timeline timeline-centered"><?php } ?>

	<?php while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>


			<?php if($postformat == "list") { ?>

			<li><a href="<?php the_permalink(); ?>" class="postTitle"><?php the_title(); ?></a>

			<?php if($showdate || $showauthor) { ?>
			<div class="postMeta">
				<?php if($showdate) { ?><span class="postDate"><?php the_date(); ?> </span><?php } ?>

				<?php if($showauthor) { ?><span class="postAuthor">By <?php the_author(); ?></span><?php } ?>
			</div>
			<?php } ?>

				<?php if($showexcerpt) { ?><div class="postExcerpt"><?php the_excerpt(); ?></div><?php } ?>


				</li>

			<?php } ?>

			<?php if($postformat == "timeline") { ?>

				<li class="timeline-item">
                    <div class="timeline-info">
                        <span><?php the_date(); ?></span>
                    </div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h3 class="timeline-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?>
                    </div>
                </li>

			<?php } ?>

	<?php } ?>
			</ul>

	</div>
	<?php /* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}

?>

<style>
	.listPosts.list ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.listPosts.list .postTitle {
		font-size: 1.3rem;
		font-weight: bold;
	}

	.listPosts.list .postMeta {
		line-height: 1;
	}

	.listPosts.list .postDate, .listPosts.list .postAuthor {
		line-height: 1;
		font-size: 0.9rem;
		color: rgba(0,0,0,0.7);
	}

	.listPosts.list .postDate {
		font-weight: bold;
	}

	.listPosts.list .postExcerpt {
		font-size: 0.9rem;

	}

	.listPosts.list .postExcerpt p:first-child {
		margin-top: 0px;
	}



.timeline .today {

	text-align: center;
	font-size: 1.2rem;
	color: rgba(0,0,0,0.5);
	margin-bottom: 2rem;
}


.timeline a {
  color: #c5050c;
}
.timeline a:hover {
  color: #ff9a9a;
  text-decoration: none;
}

.example-header {
  background: #3D4351;
  color: #FFF;
  font-weight: 300;
  padding: 3em 1em;
  text-align: center;
}
.example-header h1 {
  color: #FFF;
  font-weight: 300;
  margin-bottom: 20px;
}
.example-header p {
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-weight: 700;
}

.container-fluid .row {
  padding: 0 0 4em 0;
}
.container-fluid .row:nth-child(even) {
  background: #F1F4F5;
}

.example-title {
  text-align: center;
  margin-bottom: 60px;
  padding: 3em 0;
  border-bottom: 1px solid #E4EAEC;
}
.example-title p {
  margin: 0 auto;
  font-size: 16px;
  max-width: 400px;
}

/*==================================
    TIMELINE
==================================*/
/*-- GENERAL STYLES
------------------------------*/
.timeline {
  line-height: 1.4em;
  list-style: none;
  margin: 0;
  padding: 0;
  width: 100%;
}
.timeline h1, .timeline h2, .timeline h3, .timeline h4, .timeline h5, .timeline h6 {
  line-height: 1;
  font-size: 1.2rem;
  margin-top: 0px;
  border-bottom: none;
}

/*----- TIMELINE ITEM -----*/
.timeline-item {
  padding-left: 40px;
  position: relative;
}
.timeline-item:last-child {
  padding-bottom: 0;
}

/*----- TIMELINE INFO -----*/
.timeline-info {
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 3px;
  margin: 0 0 .5em 0;
  text-transform: uppercase;
  white-space: nowrap;
  color: #5e6a79;
}

.verlag-option .timeline-info, .verlag-option .timeline-info span {
  font-family: Verlag-Bold;
  font-weight: bold;

}


/*----- TIMELINE MARKER -----*/
.timeline-marker {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 15px;
}
.timeline-marker:before {
  background: #c5050c;
  border: 3px solid transparent;
  border-radius: 100%;
  content: "";
  display: block;
  height: 15px;
  position: absolute;
  top: 4px;
  left: 0;
  width: 15px;
  transition: background 0.3s ease-in-out, border 0.3s ease-in-out;
}
.timeline-marker:after {
  content: "";
  width: 3px;
  background: #CCD5DB;
  display: block;
  position: absolute;
  top: 24px;
  bottom: 0;
  left: 6px;
}
.timeline-item:last-child .timeline-marker:after {
  content: none;
}

.timeline-item:not(.period):hover .timeline-marker:before {
  background: transparent;
  border: 3px solid #c5050c;
}

/*----- TIMELINE CONTENT -----*/
.timeline-content {
  padding-bottom: 80px;
}

.timeline-content p {
	font-size: 1rem;
	color: #606a77;
}

.timeline-content p:last-child {
  margin-bottom: 0;
}

/*----- TIMELINE PERIOD -----*/
.period {
  padding: 0;
}
.period .timeline-info {
  display: none;
}
.period .timeline-marker:before {
  background: transparent;
  content: "";
  width: 15px;
  height: auto;
  border: none;
  border-radius: 0;
  top: 0;
  bottom: 30px;
  position: absolute;
  border-top: 3px solid #CCD5DB;
  border-bottom: 3px solid #CCD5DB;
}
.period .timeline-marker:after {
  content: "";
  height: 32px;
  top: auto;
}
.period .timeline-content {
  padding: 40px 0 70px;
}
.period .timeline-title {
  margin: 0;
}

/*----------------------------------------------
    MOD: TIMELINE SPLIT
----------------------------------------------*/
@media (min-width: 768px) {
  .timeline-split .timeline, .timeline-centered .timeline {
    display: table;
  }
  .timeline-split .timeline-item, .timeline-centered .timeline-item {
    display: table-row;
    padding: 0;
  }
  .timeline-split .timeline-info, .timeline-centered .timeline-info,
  .timeline-split .timeline-marker,
  .timeline-centered .timeline-marker,
  .timeline-split .timeline-content,
  .timeline-centered .timeline-content,
  .timeline-split .period .timeline-info,
  .timeline-centered .period .timeline-info {
    display: table-cell;
    vertical-align: top;
  }
  .timeline-split .timeline-marker, .timeline-centered .timeline-marker {
    position: relative;
  }
  .timeline-split .timeline-content, .timeline-centered .timeline-content {
    padding-left: 30px;
  }
  .timeline-split .timeline-info, .timeline-centered .timeline-info {
    padding-right: 30px;
  }
  .timeline-split .period .timeline-title, .timeline-centered .period .timeline-title {
    position: relative;
    left: -45px;
  }
}

/*----------------------------------------------
    MOD: TIMELINE CENTERED
----------------------------------------------*/
@media (min-width: 992px) {
  .timeline-centered,
  .timeline-centered .timeline-item,
  .timeline-centered .timeline-info,
  .timeline-centered .timeline-marker,
  .timeline-centered .timeline-content {
    display: block;
    margin: 0;
    padding: 0;
  }
  .timeline-centered .timeline-item {
    padding-bottom: 40px;
    overflow: hidden;
  }
  .timeline-centered .timeline-marker {
    position: absolute;
    left: 50%;
    margin-left: -7.5px;
  }
  .timeline-centered .timeline-info,
  .timeline-centered .timeline-content {
    width: 50%;
  }
  .timeline-centered > .timeline-item:nth-child(odd) .timeline-info {
    float: left;
    text-align: right;
    padding-right: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(odd) .timeline-content {
    float: right;
    text-align: left;
    padding-left: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(even) .timeline-info {
    float: right;
    text-align: left;
    padding-left: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(even) .timeline-content {
    float: left;
    text-align: right;
    padding-right: 30px;
  }
  .timeline-centered > .timeline-item.period .timeline-content {
    float: none;
    padding: 0;
    width: 100%;
    text-align: center;
  }
  .timeline-centered .timeline-item.period {
    padding: 50px 0 90px;
  }
  .timeline-centered .period .timeline-marker:after {
    height: 30px;
    bottom: 0;
    top: auto;
  }
  .timeline-centered .period .timeline-title {
    left: auto;
  }
}

/*----------------------------------------------
    MOD: MARKER OUTLINE
----------------------------------------------*/
.marker-outline .timeline-marker:before {
  background: transparent;
  border-color: #c5050c;
}
.marker-outline .timeline-item:hover .timeline-marker:before {
  background: #c5050c;
}


</style>





