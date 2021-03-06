<?php
/**
 * Template Name: CALS About
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UW Madison WP 2015
 */

get_header(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

                <style>

                @font-face {
	font-family: 'Vitesse';
	src: url(data:application/x-font-woff;base64,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) format("woff");
	font-weight: 400;
	font-style: normal;
}

                    .aboutMaxWidth {
                        max-width: 1100px;
                        padding-left: 20px;
                        padding-right: 20px;
                        margin: 0 auto;
                        position: relative;
                    }

                    .aboutMaxWidth2 {
                        max-width: 1500px;
                        padding-left: 20px;
                        padding-right: 20px;
                        margin: 0 auto;
                        position: relative;
                    }

                    .aboutTitle {
                        font-family: "Verlag-Black" !important;
                        font-weight: bold;
                        text-transform: uppercase;
                        margin-top: 2rem;
                        margin-bottom: 2rem;
                    }

                    .intro_and_nav {


                        background: gray url("/wp-content/themes/madisonwp2015/images/about_bg.png") no-repeat;
                        background-size: cover;

                    }

                    .intro_and_nav .sidebar_menu {

                        width: 300px;
                        padding-right: 2rem;
                        margin-top: 0px;
                    }

                    .intro_and_nav .sidebar_menu h1 {
                        display: none;
                    }

                    .intro_and_nav .sidebar_menu #nav_explore li {
                        border-bottom: 1px solid rgba(0,0,0,0.1);
                    }

                    .intro_and_nav .sidebar_menu #nav_explore li:last-child {
                        border-bottom: none;
                    }

                    .intro_and_nav .sidebar_menu #nav_explore li a {
                        color: #0479a8;
                    }

                    .introLeft {
                        padding-right: 350px;
                        line-height: 1.5;
                        font-size:1.2rem;
                        color: rgba(255,255,255,0.8);
                        padding-top: 0.7rem;
                        padding-bottom: 0.7rem;
                    }

                    .introNav {
                        position: absolute;
                        top: -40px;
                        right: 20px;
                        z-index:3;
                        background: #fff;
                        border-top: 3px solid #c5050c;
                        box-shadow: 0px 5px 14px rgba(0,0,0,0.2);

                    }

                    .fastfacts {
                        background: url("/wp-content/themes/madisonwp2015/images/fast-facts-bg_2.png") no-repeat;
                        background-position: center left;
                        background-size: auto 100%;
                        padding-top: 1rem;
                        padding-bottom: 2rem;
                        position: relative;
                    }

                    .fastfacts .crest {
                        position: absolute;
                        top: 30px;
                        right: -100px;
                        height: 400px;
                        width: 200px;
                        z-index:1;
                    }

                    .factsmax {
                        display: -ms-grid;
                        display: grid;
                        -ms-grid-columns: 1fr 1fr;
                        grid-template-columns: 1fr 1fr;
                        grid-gap: 1em;

                    }

                    .leftFacts {
                        text-align: center;
                        display: flex;
                        flex-direction: column;
                    }

                    .leftFacts h2 {
                        margin-bottom: 2rem;
                        font-family: "Vitesse";
                        font-size: 1.8rem;
                        text-transform: uppercase;
                        position: relative;
                    }

                    .leftFacts h2:before {
                        content: "";
                        position: absolute;
                        top: -4px;
                        left: 50%;
                        width: 30px;
                        height: 3px;
                        background: #c5050c;
                        transform: translateX(-50%);
                    }

                    .leftFacts button, .leftFacts a {
                        background: #0479a8;
                        border-radius: 4px;
                        box-shadow: 0px 2px 6px rgba(0,0,0,0.2);
                        color: #fff;

                        text-transform: uppercase;
                        font-family: "Verlag-Black";
                        letter-spacing: 0.8px;
                        padding: 0.8rem;
                        padding-left: 1rem;
                        padding-right: 1rem;
                        font-size: 0.9rem;
                        display: inline-block;
                        margin: 0 auto;
                        margin-bottom: 0.5rem;
                        transition: 0.3s;
                    }

                    .leftFacts a:active {
                        text-decoration: none;

                    }

                    .leftFacts a:hover {
                        text-decoration: none;
                        transform: translateY(-2px);
                        box-shadow: 0px 4px 9px rgba(0,0,0,0.2);
                    }

                    .leftFacts button svg, .leftFacts a svg {
                        display: inline-block;
                        padding-right: 0.4rem;
                        width: auto;
                    }

                    .leftFacts button svg path, .leftFacts a svg path {
                        fill: rgba(255,255,255,1);
                    }

                    .rightFacts {
                        align-self: center;
                    }

                    .academics {
                        background: #646569;
                        color: rgba(255,255,255,0.8);
                        padding-top: 2rem;
                        padding-bottom: 2rem;
                    }

                    h2.academicsTitle {
                        font-size: 1.8rem;
                        text-align: center;
                        text-transform: uppercase;
                        display: block;
                        font-family: "Vitesse";

                       letter-spacing: 1px;
                       margin-top: 0px;
                       color: rgba(255,255,255,0.6);
                       position: relative;

                    }

                    h2.academicsTitle:before {
                        content: "";
                        position: absolute;
                        top: -6px;
                        width: 30px;
                        left: 50%;
                        height: 3px;
                        background: rgba(255,255,255,0.5);
                        transform: translateX(-50%);
                    }

                    .academics_cols {
                        display: -ms-grid;
                        display: grid;
                        -ms-grid-columns: 1fr 1fr 1fr 1fr;
                        grid-template-columns: 1fr 1fr 1fr 1fr;
                        grid-gap: 0.2em;
                        padding-top: 1rem;
                        padding-bottom: 1rem;
                    }


                    .research_outreach {
                        padding-top: 3rem;
                        padding-bottom: 4rem;
                        background: #efefef url("/wp-content/themes/madisonwp2015/images/ro_bg.jpg") no-repeat;
                        background-size: 100% auto;
                        background-position: top;

                    }

                    .research_outreach .researchCol h2, .research_outreach .outreachCol h2 {
                       font-family: "Vitesse";
                       font-size: 2rem;
                       text-align: center;
                       color: rgba(0,0,0,0.8);
                       margin-bottom: 1rem;
                       text-transform: uppercase;
                       position: relative;
                    }

                    .research_outreach h2:before {
                        content: "";
                        position: absolute;
                        top: -4px;
                        left: 50%;
                        width: 30px;
                        height: 3px;
                        background: #c5050c;
                        transform: translateX(-50%);
                    }

                    .research_outreach .aboutMaxWidth {
                        display: -ms-grid;
                        display: grid;
                        -ms-grid-columns: 1fr 1fr;
                        grid-template-columns: 1fr 1fr;
                        -ms-grid-gap: 12em;
                        grid-gap: 12em;
                    }

                    .researchCol .col_inner, .outreachCol .col_inner {
                        background: #fff;
                        border-top: 3px solid #c5050c;
                        padding: 2rem;
                        text-align: center;
                        box-shadow: 0px 4px 16px rgba(0,0,0,0.17);
                    }

                    .aboutpath {
                        position: absolute;
                        top: 58px;
                        left: 260px;
                        right: -60px;
                        bottom: 500px;
                        z-index:3;
                        pointer-events: none;
                    }

                    .site-content {
                        overflow: hidden;
                    }

                    @media only screen and (max-width: 1200px) {


                        .academics_cols {
                            display: -ms-grid;
                            display: grid;
                            -ms-grid-columns: 1fr 1fr;
                            grid-template-columns: 1fr 1fr;
                            -ms-grid-gap: 1em;
                            grid-gap: 1em;
                            padding-top: 1rem;
                            padding-bottom: 1rem;
                        }

                        .research_outreach .aboutMaxWidth {
                            -ms-grid-grap: 4em;
                            grid-gap: 4em;

                        }

                        .aboutpath {
                            position: absolute;
                            top: 58px;
                            left: 260px;
                            right: -160px;
                            bottom: 500px;
                            z-index:3;
                            pointer-events: none;
                        }
                    }

                    @media only screen and (max-width: 900px) {
                        .aboutpath {
                            position: absolute;
                            top: 58px;
                            left: 260px;
                            right: -360px;
                            bottom: 500px;
                            z-index:3;
                            pointer-events: none;
                        }
                    }

                    @media only screen and (max-width: 765px) {
                    .introLeft {
                            padding-right: 0px;

                        }
                    }

                    @media only screen and (max-width: 650px) {
                        .research_outreach .aboutMaxWidth {
                            -ms-grid-columns: 1fr;
                            grid-template-columns: 1fr;
                            grid-gap: 1em;
                        }
                    }

                    @media only screen and (max-width: 500px) {
                        .introLeft {
                            padding-right: 0px;

                        }

                        .fastfacts .crest {
                            display: none;
                        }

                        .academics_cols {
                            display: -ms-grid;
                            display: grid;
                            -ms-grid-columns: 1fr;
                            grid-template-columns: 1fr;
                            grid-gap: 1em;
                            padding-top: 1rem;
                            padding-bottom: 1rem;
                        }

                        .research_outreach .aboutMaxWidth {
                            -ms-grid-columns: 1fr;
                            grid-template-columns: 1fr;
                            grid-gap: 1em;
                        }

                        .factsmax {
                            -ms-grid-columns: 1fr;
                            grid-template-columns: 1fr;
                        }

                        .aboutpath {
                            display: none;
                        }
                    }

                </style>

                    <div class="aboutMaxWidth">


<div class="aboutpath">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 3210">
  <defs>
    <style>
      .cls-2{fill:none}.cls-3,.cls-4{fill:#231f20}.cls-3{fill-rule:evenodd}.cls-5{fill:#c40113}
    </style>
  </defs>
  <g id="Group_295" data-name="Group 295" transform="translate(-545 -343)">
    <g id="sidebar_nav" data-name="sidebar nav" transform="translate(545 371.302)" opacity=".115">
      <g id="Group_277" data-name="Group 277">
        <g id="Group_276" data-name="Group 276">
          <g id="Group_17" data-name="Group 17">
            <g id="Group_16" data-name="Group 16">
              <g id="Group_15" data-name="Group 15">
                <path id="Path_10" data-name="Path 10" class="cls-2" d="M0 0v7.893l.376 7.141c.376 4.51.752 9.4 1.128 13.906C2.631 37.96 3.758 46.98 5.262 56l55.625-10.147c-1.5-7.517-2.631-15.41-3.383-22.926l-1.128-11.276V1.5z"/>
              </g>
              <path id="Path_11" data-name="Path 11" class="cls-3" d="M12.938 10l-5.638.752 1.5 9.4 5.638-.752z" transform="translate(20.137 27.584)"/>
              <path id="Path_12" data-name="Path 12" class="cls-3" d="M12.438 5.6L6.8 5.976c.376 3.383.752 6.389 1.128 9.4l5.638-.752c-.753-2.635-.753-6.017-1.128-9.024z" transform="translate(18.757 15.447)"/>
              <path id="Path_13" data-name="Path 13" class="cls-3" d="M12.138 1.2H6.5c0 3.007.376 6.389.376 9.4l5.638-.376a72.419 72.419 0 0 0-.376-9.024z" transform="translate(17.93 3.31)"/>
            </g>
          </g>
          <g id="Group_20" data-name="Group 20" transform="translate(5.638 45.477)">
            <g id="Group_19" data-name="Group 19">
              <g id="Group_18" data-name="Group 18">
                <path id="Path_14" data-name="Path 14" class="cls-2" d="M1.5 22.624a408.58 408.58 0 0 0 13.154 52.242L68.4 57.577A321.482 321.482 0 0 1 57.125 12.1z" transform="translate(-1.5 -12.1)"/>
              </g>
              <path id="Path_15" data-name="Path 15" class="cls-3" d="M15.462 23.1L10.2 24.6l2.631 9.02 5.262-1.879z" transform="translate(22.498 18.243)"/>
              <path id="Path_16" data-name="Path 16" class="cls-3" d="M14.638 18.8L9 19.928l2.255 9.02 5.638-1.128z" transform="translate(19.188 6.381)"/>
              <path id="Path_17" data-name="Path 17" class="cls-3" d="M13.738 14.4L8.1 15.528c.376 3.007 1.128 6.013 1.879 9.4l5.638-1.128c-.752-3.387-1.504-6.393-1.879-9.4z" transform="translate(16.706 -5.756)"/>
            </g>
          </g>
          <g id="Group_23" data-name="Group 23" transform="translate(18.792 91.33)">
            <g id="Group_22" data-name="Group 22">
              <g id="Group_21" data-name="Group 21">
                <path id="Path_18" data-name="Path 18" class="cls-2" d="M5 41.213a410.172 410.172 0 0 0 19.544 50.363L75.658 67.9c-6.389-14.282-12.4-28.564-16.913-43.6z" transform="translate(-5 -24.3)"/>
              </g>
              <path id="Path_19" data-name="Path 19" class="cls-3" d="M19.962 35.6L14.7 37.855a59.97 59.97 0 0 0 3.758 8.645l5.262-2.255a59.965 59.965 0 0 1-3.758-8.645z" transform="translate(21.757 6.87)"/>
              <path id="Path_20" data-name="Path 20" class="cls-3" d="M18.262 31.5L13 33.379c1.128 3.007 2.255 6.013 3.383 8.644l5.262-2.255c-1.128-2.255-2.256-5.261-3.383-8.268z" transform="translate(17.067 -4.439)"/>
              <path id="Path_21" data-name="Path 21" class="cls-3" d="M16.762 27.3L11.5 29.179l3.007 9.02 5.262-1.879z" transform="translate(12.93 -16.025)"/>
            </g>
          </g>
          <g id="Group_26" data-name="Group 26" transform="translate(38.336 134.927)">
            <g id="Group_25" data-name="Group 25">
              <g id="Group_24" data-name="Group 24">
                <path id="Path_22" data-name="Path 22" class="cls-2" d="M10.2 59.578a441.32 441.32 0 0 0 25.557 47.356l47.732-29.691C75.6 63.712 67.7 50.182 61.315 35.9z" transform="translate(-10.2 -35.9)"/>
              </g>
              <path id="Path_23" data-name="Path 23" class="cls-3" d="M25.586 47.6L20.7 50.231l4.886 8.269 4.886-3.007z" transform="translate(18.763 -3.626)"/>
              <path id="Path_24" data-name="Path 24" class="cls-3" d="M23.486 43.7L18.6 46.331l4.134 8.269 4.886-2.631z" transform="translate(12.971 -14.384)"/>
              <path id="Path_25" data-name="Path 25" class="cls-3" d="M21.762 39.7L16.5 41.955c1.5 3.007 2.631 5.638 4.134 8.644l4.886-2.631a80.418 80.418 0 0 0-3.758-8.268z" transform="translate(7.178 -25.418)"/>
            </g>
          </g>
          <g id="Group_29" data-name="Group 29" transform="translate(63.893 175.894)">
            <g id="Group_28" data-name="Group 28">
              <g id="Group_27" data-name="Group 27">
                <path id="Path_26" data-name="Path 26" class="cls-2" d="M17 76.867c9.772 15.034 19.92 30.067 31.195 43.6l43.974-35.331C82.021 73.109 73.376 59.954 64.732 46.8z" transform="translate(-17 -46.8)"/>
              </g>
              <path id="Path_27" data-name="Path 27" class="cls-3" d="M32.71 58.7l-4.51 3.383c1.879 2.631 3.758 4.886 6.013 7.517l4.51-3.383c-2.254-2.631-4.134-4.886-6.013-7.517z" transform="translate(13.894 -13.975)"/>
              <path id="Path_28" data-name="Path 28" class="cls-3" d="M30.11 55.1l-4.51 3.007L30.862 66l4.51-3.383z" transform="translate(6.722 -23.905)"/>
              <path id="Path_29" data-name="Path 29" class="cls-3" d="M27.986 51.4L23.1 54.407l5.262 7.893 4.51-3.007z" transform="translate(-.174 -34.111)"/>
            </g>
          </g>
          <g id="Group_32" data-name="Group 32" transform="translate(95.088 214.23)">
            <g id="Group_31" data-name="Group 31">
              <g id="Group_30" data-name="Group 30">
                <path id="Path_30" data-name="Path 30" class="cls-2" d="M25.3 92.329c3.007 3.383 5.638 7.141 8.644 10.524L42.965 113c5.638 6.765 12.4 12.779 18.416 19.168l39.463-40.215c-5.638-5.638-11.275-10.9-16.161-16.913l-7.893-9.02c-2.63-3.007-4.89-6.013-7.516-9.02z" transform="translate(-25.3 -57)"/>
              </g>
              <path id="Path_31" data-name="Path 31" class="cls-3" d="M41.134 68.8L37 72.934l6.765 6.389 3.758-3.758z" transform="translate(6.974 -24.451)"/>
              <path id="Path_32" data-name="Path 32" class="cls-3" d="M38.41 65.5l-4.51 3.758 6.389 7.142 4.134-3.758z" transform="translate(-1.578 -33.553)"/>
              <path id="Path_33" data-name="Path 33" class="cls-3" d="M35.51 62.2L31 65.958c1.879 2.255 3.758 4.886 6.013 7.141l4.134-3.758c-1.878-2.255-3.758-4.886-5.637-7.141z" transform="translate(-9.577 -42.656)"/>
            </g>
          </g>
          <g id="Group_35" data-name="Group 35" transform="translate(131.169 249.184)">
            <g id="Group_34" data-name="Group 34">
              <g id="Group_33" data-name="Group 33">
                <path id="Path_34" data-name="Path 34" class="cls-2" d="M34.9 106.515a115.372 115.372 0 0 0 9.772 9.4l9.772 9.02c6.765 6.013 13.53 11.275 20.671 16.913l34.953-44.349c-6.013-5.262-12.4-9.772-18.04-15.034l-8.644-7.893a89.864 89.864 0 0 1-8.645-8.272z" transform="translate(-34.9 -66.3)"/>
              </g>
              <path id="Path_35" data-name="Path 35" class="cls-3" d="M50.658 77.9L46.9 82.034l7.141 6.013 3.759-4.134z" transform="translate(-1.799 -34.302)"/>
              <path id="Path_36" data-name="Path 36" class="cls-3" d="M47.258 75L43.5 79.134l7.141 6.389 3.383-4.134z" transform="translate(-11.178 -42.302)"/>
              <path id="Path_37" data-name="Path 37" class="cls-3" d="M43.958 72L40.2 76.134c2.255 2.255 4.51 4.134 6.765 6.389l3.758-4.134c-2.254-2.255-4.51-4.134-6.765-6.389z" transform="translate(-20.28 -50.577)"/>
            </g>
          </g>
          <g id="Group_38" data-name="Group 38" transform="translate(171.384 280.003)">
            <g id="Group_37" data-name="Group 37">
              <g id="Group_36" data-name="Group 36">
                <path id="Path_38" data-name="Path 38" class="cls-2" d="M45.6 119.225c6.765 5.638 14.282 10.524 21.423 15.785a111.881 111.881 0 0 0 10.9 7.517l11.277 7.141 30.067-47.732-10.148-6.389c-3.383-2.255-6.765-4.134-9.772-6.765-6.391-4.882-12.78-9.02-19.169-14.282z" transform="translate(-45.6 -74.5)"/>
              </g>
              <path id="Path_39" data-name="Path 39" class="cls-3" d="M61.083 85.9L57.7 90.41l7.893 5.262 3.007-4.886z" transform="translate(-12.223 -43.054)"/>
              <path id="Path_40" data-name="Path 40" class="cls-3" d="M57.383 83.3L54 88.186l7.893 5.262 3.007-4.51z" transform="translate(-22.429 -50.226)"/>
              <path id="Path_41" data-name="Path 41" class="cls-3" d="M53.783 80.7L50.4 85.21l7.517 5.638 3.383-4.51z" transform="translate(-32.36 -57.398)"/>
            </g>
          </g>
          <g id="Group_41" data-name="Group 41" transform="translate(214.606 307.815)">
            <g id="Group_40" data-name="Group 40">
              <g id="Group_39" data-name="Group 39">
                <path id="Path_42" data-name="Path 42" class="cls-2" d="M57.1 129.632l5.638 3.758 5.638 3.383 11.275 6.765a115.446 115.446 0 0 0 11.649 6.39l11.651 6.013 25.933-49.987-10.524-5.638c-3.758-1.879-6.765-4.134-10.524-6.014l-10.521-6.013c-1.879-1.128-3.383-1.879-5.262-3.007L87.167 81.9z" transform="translate(-57.1 -81.9)"/>
              </g>
              <path id="Path_43" data-name="Path 43" class="cls-3" d="M71.931 92.8L69.3 97.686l8.269 4.51L80.2 97.31z" transform="translate(-23.447 -51.833)"/>
              <path id="Path_44" data-name="Path 44" class="cls-3" d="M68.031 90.6L65.4 95.486l7.893 4.886 3.007-4.886z" transform="translate(-34.205 -57.902)"/>
              <path id="Path_45" data-name="Path 45" class="cls-3" d="M64.507 88.3L61.5 93.186a89.906 89.906 0 0 0 7.893 4.886l3.007-4.886a89.925 89.925 0 0 1-7.893-4.886z" transform="translate(-44.963 -64.246)"/>
            </g>
          </g>
          <g id="Group_44" data-name="Group 44" transform="translate(260.835 331.493)">
            <g id="Group_43" data-name="Group 43">
              <g id="Group_42" data-name="Group 42">
                <path id="Path_46" data-name="Path 46" class="cls-2" d="M69.4 138.187l11.651 6.013c3.758 1.879 7.893 3.758 12.027 5.638l12.027 5.262c4.134 1.879 7.893 3.758 12.027 5.262l21.8-52.242a95.828 95.828 0 0 1-10.9-4.886l-11.275-4.51c-3.758-1.879-7.517-3.383-10.9-4.886L95.333 88.2z" transform="translate(-69.4 -88.2)"/>
              </g>
              <path id="Path_47" data-name="Path 47" class="cls-3" d="M83.655 98.7l-2.255 5.262c3.007 1.128 5.638 2.631 8.644 3.758l2.255-5.262c-3.006-1.127-6.013-2.63-8.644-3.758z" transform="translate(-36.299 -59.237)"/>
              <path id="Path_48" data-name="Path 48" class="cls-3" d="M79.555 96.8l-2.255 5.262 8.644 3.758 2.255-5.262z" transform="translate(-47.608 -64.478)"/>
              <path id="Path_49" data-name="Path 49" class="cls-3" d="M75.931 94.9L73.3 99.786l8.269 4.51 2.631-5.262z" transform="translate(-58.642 -69.719)"/>
            </g>
          </g>
          <g id="Group_47" data-name="Group 47" transform="translate(308.567 352.165)">
            <g id="Group_46" data-name="Group 46">
              <g id="Group_45" data-name="Group 45">
                <path id="Path_50" data-name="Path 50" class="cls-2" d="M82.1 145.566l24.43 9.772c8.269 3.007 16.537 5.638 24.806 8.644L149 110.613c-7.517-2.631-15.41-5.262-22.926-7.893l-22.551-9.02z" transform="translate(-82.1 -93.7)"/>
              </g>
              <path id="Path_51" data-name="Path 51" class="cls-3" d="M95.779 103.6l-1.879 5.262 9.02 3.007 1.879-5.262z" transform="translate(-49.551 -66.392)"/>
              <path id="Path_52" data-name="Path 52" class="cls-3" d="M91.579 102l-1.879 5.262c3.007 1.128 5.638 2.255 8.644 3.383l1.879-5.262c-2.63-.752-5.637-2.255-8.644-3.383z" transform="translate(-61.136 -70.805)"/>
              <path id="Path_53" data-name="Path 53" class="cls-3" d="M87.479 100.4l-1.879 5.262 8.644 3.383 1.879-5.262z" transform="translate(-72.445 -75.219)"/>
            </g>
          </g>
          <g id="Group_50" data-name="Group 50" transform="translate(357.802 368.702)">
            <g id="Group_49" data-name="Group 49">
              <g id="Group_48" data-name="Group 48">
                <path id="Path_54" data-name="Path 54" class="cls-2" d="M95.2 151.47l12.4 4.134 11.651 3.758 24.054 7.893L160.6 113.51l-24.054-7.517-12.027-4.134-11.654-3.759z" transform="translate(-95.2 -98.1)"/>
              </g>
              <path id="Rectangle_19" data-name="Rectangle 19" class="cls-4" transform="rotate(-72.206 50.047 -8.811)" d="M0 0h5.638v9.396H0z"/>
              <path id="Path_55" data-name="Path 55" class="cls-3" d="M104.279 106.4l-1.879 5.262 9.02 3.007 1.879-5.262z" transform="translate(-75.339 -75.205)"/>
              <path id="Path_56" data-name="Path 56" class="cls-3" d="M100.079 105l-1.879 5.262 9.02 3.007 1.5-5.262z" transform="translate(-86.925 -79.067)"/>
            </g>
          </g>
          <g id="Group_53" data-name="Group 53" transform="translate(405.91 384.111)">
            <g id="Group_52" data-name="Group 52">
              <g id="Group_51" data-name="Group 51">
                <path id="Path_57" data-name="Path 57" class="cls-2" d="M108 155.946l23.678 7.517 23.678 8.269 18.04-53.745-24.054-7.893-24.053-7.894z" transform="translate(-108 -102.2)"/>
              </g>
              <path id="Path_58" data-name="Path 58" class="cls-3" d="M121.279 111.9l-1.879 5.638 9.02 2.631 1.879-5.262z" transform="translate(-76.554 -75.443)"/>
              <path id="Path_59" data-name="Path 59" class="cls-3" d="M117.079 110.5l-1.879 5.262 9.02 3.007 1.5-5.262z" transform="translate(-88.139 -79.305)"/>
              <path id="Path_60" data-name="Path 60" class="cls-3" d="M112.5 109.2l-1.5 5.262 8.644 2.631 1.879-5.262z" transform="translate(-99.725 -82.891)"/>
            </g>
          </g>
          <g id="Group_56" data-name="Group 56" transform="translate(453.266 400.272)">
            <g id="Group_55" data-name="Group 55">
              <g id="Group_54" data-name="Group 54">
                <path id="Path_61" data-name="Path 61" class="cls-2" d="M120.6 159.87c15.785 5.262 31.571 10.524 47.356 16.161l18.792-52.994c-16.161-6.014-31.947-11.275-48.108-16.537z" transform="translate(-120.6 -106.5)"/>
              </g>
              <path id="Path_62" data-name="Path 62" class="cls-3" d="M133.979 116.2l-1.879 5.638 9.02 3.007 1.88-5.262z" transform="translate(-88.878 -79.743)"/>
              <path id="Path_63" data-name="Path 63" class="cls-3" d="M129.779 114.8l-1.879 5.262 9.02 3.007 1.879-5.262z" transform="translate(-100.463 -83.605)"/>
              <path id="Rectangle_20" data-name="Rectangle 20" class="cls-4" transform="rotate(-71.308 27.377 7.424)" d="M0 0h5.638v9.396H0z"/>
            </g>
          </g>
          <g id="Group_59" data-name="Group 59" transform="translate(500.622 416.809)">
            <g id="Group_58" data-name="Group 58">
              <g id="Group_57" data-name="Group 57">
                <path id="Path_64" data-name="Path 64" class="cls-2" d="M133.2 163.894l23.3 8.269 11.651 4.51 11.651 4.51 20.3-52.618-12.027-4.886-12.027-4.134-24.056-8.645z" transform="translate(-133.2 -110.9)"/>
              </g>
              <path id="Path_65" data-name="Path 65" class="cls-3" d="M146.579 120.8l-1.879 5.262 8.644 3.383 2.255-5.262z" transform="translate(-101.478 -83.592)"/>
              <path id="Path_66" data-name="Path 66" class="cls-3" d="M142.379 119.3l-1.879 5.262 9.02 3.007 1.879-5.262z" transform="translate(-113.063 -87.729)"/>
              <path id="Path_67" data-name="Path 67" class="cls-3" d="M138.555 117.8l-2.255 5.262 9.02 3.007 1.879-5.262z" transform="translate(-124.649 -91.867)"/>
            </g>
          </g>
          <g id="Group_62" data-name="Group 62" transform="translate(547.227 434.85)">
            <g id="Group_61" data-name="Group 61">
              <g id="Group_60" data-name="Group 60">
                <path id="Path_68" data-name="Path 68" class="cls-2" d="M145.6 167.942c15.034 6.013 30.819 12.027 45.477 18.792l22.551-51.49c-15.785-7.517-31.947-13.155-47.732-19.544z" transform="translate(-145.6 -115.7)"/>
              </g>
              <path id="Path_69" data-name="Path 69" class="cls-3" d="M159.355 125.8l-2.255 5.262 8.644 3.758 2.256-5.262z" transform="translate(-113.878 -87.84)"/>
              <path id="Path_70" data-name="Path 70" class="cls-3" d="M155.255 124.1L153 129.362l8.644 3.383 2.255-5.262z" transform="translate(-125.188 -92.529)"/>
              <path id="Path_71" data-name="Path 71" class="cls-3" d="M150.779 122.5l-1.879 5.262 8.644 3.383 2.255-5.262z" transform="translate(-136.497 -96.943)"/>
            </g>
          </g>
          <g id="Group_65" data-name="Group 65" transform="translate(592.704 454.018)">
            <g id="Group_64" data-name="Group 64">
              <g id="Group_63" data-name="Group 63">
                <path id="Path_72" data-name="Path 72" class="cls-2" d="M157.7 172.666l22.175 9.772 21.423 10.9 26.309-49.987-23.678-11.651-23.678-10.9z" transform="translate(-157.7 -120.8)"/>
              </g>
              <path id="Path_73" data-name="Path 73" class="cls-3" d="M171.555 131.4l-2.255 5.262 8.269 4.134 2.631-5.262z" transform="translate(-125.702 -91.561)"/>
              <path id="Path_74" data-name="Path 74" class="cls-3" d="M167.555 129.4l-2.255 5.262a56.575 56.575 0 0 1 8.269 4.134l2.631-5.262c-3.007-1.503-5.638-2.634-8.645-4.134z" transform="translate(-136.736 -97.078)"/>
              <path id="Path_75" data-name="Path 75" class="cls-3" d="M163.455 127.6l-2.255 5.262 8.644 3.758 2.255-5.262z" transform="translate(-148.046 -102.043)"/>
            </g>
          </g>
          <g id="Group_68" data-name="Group 68" transform="translate(636.302 476.944)">
            <g id="Group_67" data-name="Group 67">
              <g id="Group_66" data-name="Group 66">
                <path id="Path_76" data-name="Path 76" class="cls-2" d="M169.3 176.511l10.9 5.638c3.383 1.879 6.765 4.134 10.148 6.013 6.765 4.134 13.906 7.893 20.3 12.4l30.819-46.98c-7.517-4.886-15.41-9.02-22.926-13.906-3.758-2.255-7.517-4.51-11.651-6.765l-11.657-6.011z" transform="translate(-169.3 -126.9)"/>
              </g>
              <path id="Path_77" data-name="Path 77" class="cls-3" d="M183.907 137.9l-3.007 4.886 8.269 4.51 3.007-4.51z" transform="translate(-137.302 -96.557)"/>
              <path id="Path_78" data-name="Path 78" class="cls-3" d="M180.107 135.6l-3.007 4.886 8.268 4.886 2.632-4.886z" transform="translate(-147.784 -102.902)"/>
              <path id="Path_79" data-name="Path 79" class="cls-3" d="M175.931 133.5l-2.631 4.886 8.268 4.134 2.631-4.886z" transform="translate(-158.266 -108.694)"/>
            </g>
          </g>
          <g id="Group_71" data-name="Group 71" transform="translate(677.644 503.253)">
            <g id="Group_70" data-name="Group 70">
              <g id="Group_69" data-name="Group 69">
                <path id="Path_80" data-name="Path 80" class="cls-2" d="M180.3 180.88l19.168 13.53c3.383 2.255 6.014 4.886 9.02 7.141l9.02 7.517 36.833-42.846-10.524-8.644a72.667 72.667 0 0 0-10.524-8.269L211.119 133.9z" transform="translate(-180.3 -133.9)"/>
              </g>
              <path id="Path_81" data-name="Path 81" class="cls-3" d="M195.558 145.6l-3.758 4.51 7.141 5.638 3.758-4.134z" transform="translate(-148.578 -101.626)"/>
              <path id="Path_82" data-name="Path 82" class="cls-3" d="M191.683 142.9l-3.383 4.51 7.517 5.262 3.383-4.51z" transform="translate(-158.233 -109.074)"/>
              <path id="Path_83" data-name="Path 83" class="cls-3" d="M187.707 140.3l-3.007 4.886 7.517 5.262 3.383-4.886z" transform="translate(-168.163 -116.246)"/>
            </g>
          </g>
          <g id="Group_74" data-name="Group 74" transform="translate(714.853 535.576)">
            <g id="Group_73" data-name="Group 73">
              <g id="Group_72" data-name="Group 72">
                <path id="Path_84" data-name="Path 84" class="cls-2" d="M190.2 185.346c3.007 2.631 6.013 4.886 8.644 7.517l8.269 8.269 8.269 8.269c2.631 2.631 5.262 6.013 7.893 8.644l42.094-37.584c-3.007-3.383-5.638-6.765-9.02-10.148l-9.772-9.4-9.772-9.4c-3.007-3.383-6.765-6.013-10.148-9.02z" transform="translate(-190.2 -142.5)"/>
              </g>
              <path id="Path_85" data-name="Path 85" class="cls-3" d="M205.734 154.7l-4.134 3.758c2.255 2.255 4.134 4.51 6.389 6.765l4.134-3.758c-2.254-2.255-4.134-4.51-6.389-6.765z" transform="translate(-158.754 -108.847)"/>
              <path id="Path_86" data-name="Path 86" class="cls-3" d="M202.258 151.5l-3.758 4.134 6.389 6.389 4.134-3.758z" transform="translate(-167.305 -117.674)"/>
              <path id="Path_87" data-name="Path 87" class="cls-3" d="M198.958 148.5l-3.758 4.134c2.255 1.879 4.886 3.758 6.765 6.013l3.758-4.134a35.126 35.126 0 0 0-6.765-6.013z" transform="translate(-176.408 -125.949)"/>
            </g>
          </g>
          <g id="Group_77" data-name="Group 77" transform="translate(748.303 573.912)">
            <g id="Group_76" data-name="Group 76">
              <g id="Group_75" data-name="Group 75">
                <path id="Path_88" data-name="Path 88" class="cls-2" d="M199.1 189.908l7.517 9.02c2.631 3.007 5.262 6.013 7.517 9.02l14.282 19.168 45.853-33.074L258.107 173a111.873 111.873 0 0 0-8.644-10.148l-8.645-10.152z" transform="translate(-199.1 -152.7)"/>
              </g>
              <path id="Path_89" data-name="Path 89" class="cls-3" d="M214.71 165l-4.51 3.383 5.262 7.517 4.886-3.383z" transform="translate(-168.481 -118.771)"/>
              <path id="Path_90" data-name="Path 90" class="cls-3" d="M211.634 161.4l-4.134 3.758 5.638 7.517 4.51-3.758z" transform="translate(-175.929 -128.702)"/>
              <path id="Path_91" data-name="Path 91" class="cls-3" d="M208.734 158.1l-4.134 3.758 6.013 6.765 4.51-3.383z" transform="translate(-183.929 -137.804)"/>
            </g>
          </g>
          <g id="Group_80" data-name="Group 80" transform="translate(777.618 615.254)">
            <g id="Group_79" data-name="Group 79">
              <g id="Group_78" data-name="Group 78">
                <path id="Path_92" data-name="Path 92" class="cls-2" d="M206.9 196.774c4.886 6.389 9.02 13.53 13.906 19.92l6.765 10.148 6.389 10.524 47.356-30.443-6.765-10.9-7.141-10.9-14.657-21.423z" transform="translate(-206.9 -163.7)"/>
              </g>
              <path id="Path_93" data-name="Path 93" class="cls-3" d="M222.686 176l-4.886 3.007 4.886 7.893 4.886-3.007z" transform="translate(-176.833 -129.771)"/>
              <path id="Path_94" data-name="Path 94" class="cls-3" d="M220.186 172.3l-4.886 3.383 5.262 7.517 4.886-3.007z" transform="translate(-183.729 -139.978)"/>
              <path id="Path_95" data-name="Path 95" class="cls-3" d="M217.686 168.6l-4.886 3.383 5.262 7.517 4.886-3.007z" transform="translate(-190.625 -150.184)"/>
            </g>
          </g>
          <g id="Group_83" data-name="Group 83" transform="translate(805.055 658.476)">
            <g id="Group_82" data-name="Group 82">
              <g id="Group_81" data-name="Group 81">
                <path id="Path_96" data-name="Path 96" class="cls-2" d="M214.2 205.643l13.155 21.047 12.779 21.047 48.108-28.94L275.462 197l-13.906-21.8z" transform="translate(-214.2 -175.2)"/>
              </g>
              <path id="Rectangle_21" data-name="Rectangle 21" class="cls-4" transform="rotate(-31.2 107.331 -47.255)" d="M0 0h5.638v9.396H0z"/>
              <path id="Path_97" data-name="Path 97" class="cls-3" d="M227.486 183.6l-4.886 3.007c1.5 2.631 3.383 5.262 4.886 7.893l4.886-3.007a89.924 89.924 0 0 1-4.886-7.893z" transform="translate(-191.029 -152.029)"/>
              <path id="Path_98" data-name="Path 98" class="cls-3" d="M225.086 179.8l-4.886 3.007 4.886 7.893 4.886-3.007z" transform="translate(-197.649 -162.511)"/>
            </g>
          </g>
          <g id="Group_86" data-name="Group 86" transform="translate(830.988 702.074)">
            <g id="Group_85" data-name="Group 85">
              <g id="Group_84" data-name="Group 84">
                <path id="Path_99" data-name="Path 99" class="cls-2" d="M221.1 215.74c8.644 14.282 16.913 28.94 25.557 43.222l48.484-28.562c-8.644-14.658-16.913-28.94-25.933-43.6z" transform="translate(-221.1 -186.8)"/>
              </g>
              <path id="Rectangle_22" data-name="Rectangle 22" class="cls-4" transform="rotate(-30.51 109.131 -49.292)" d="M0 0h5.638v9.396H0z"/>
              <path id="Path_100" data-name="Path 100" class="cls-3" d="M234.386 195.1l-4.886 3.007 4.51 7.893 4.886-2.631z" transform="translate(-197.929 -163.905)"/>
              <path id="Path_101" data-name="Path 101" class="cls-3" d="M232.086 191.3l-4.886 3.007 4.886 7.893 4.886-3.007z" transform="translate(-204.274 -174.387)"/>
            </g>
          </g>
          <g id="Group_89" data-name="Group 89" transform="translate(856.545 745.672)">
            <g id="Group_88" data-name="Group 88">
              <g id="Group_87" data-name="Group 87">
                <path id="Path_102" data-name="Path 102" class="cls-2" d="M227.9 226.964c4.51 7.141 7.893 14.282 12.027 21.423l11.651 21.047 50.363-25.557-12.4-22.926c-4.134-7.517-8.268-15.41-12.779-22.551z" transform="translate(-227.9 -198.4)"/>
              </g>
              <path id="Path_103" data-name="Path 103" class="cls-3" d="M243.186 210.7l-4.886 2.631 4.51 7.893 4.886-2.255z" transform="translate(-199.212 -164.471)"/>
              <path id="Path_104" data-name="Path 104" class="cls-3" d="M241.086 206.7l-4.886 3.007 4.51 7.893 4.886-2.631z" transform="translate(-205.005 -175.505)"/>
              <path id="Path_105" data-name="Path 105" class="cls-3" d="M238.886 202.8L234 205.807c1.5 2.631 3.007 5.262 4.51 8.269l4.886-2.631a62.572 62.572 0 0 0-4.51-8.645z" transform="translate(-211.074 -186.263)"/>
            </g>
          </g>
          <g id="Group_92" data-name="Group 92" transform="translate(879.848 791.525)">
            <g id="Group_91" data-name="Group 91">
              <g id="Group_90" data-name="Group 90">
                <path id="Path_106" data-name="Path 106" class="cls-2" d="M234.1 236.157c3.759 7.141 6.765 14.658 10.148 21.8a224.024 224.024 0 0 1 9.4 21.8l52.618-20.671c-3.007-8.269-6.765-16.537-10.524-24.43s-7.142-16.163-11.279-24.056z" transform="translate(-234.1 -210.6)"/>
              </g>
              <path id="Path_107" data-name="Path 107" class="cls-3" d="M249.362 222.8l-5.262 2.255c1.5 2.631 2.255 5.638 3.383 8.644l5.262-2.255c-1.128-3.006-2.256-6.013-3.383-8.644z" transform="translate(-206.516 -176.947)"/>
              <path id="Path_108" data-name="Path 108" class="cls-3" d="M247.186 218.7l-4.886 2.255 3.758 8.644 5.262-2.255z" transform="translate(-211.481 -188.257)"/>
              <path id="Path_109" data-name="Path 109" class="cls-3" d="M245.662 214.6l-5.262 2.631 3.758 8.644 5.262-2.631z" transform="translate(-216.722 -199.566)"/>
            </g>
          </g>
          <g id="Group_95" data-name="Group 95" transform="translate(899.391 840.008)">
            <g id="Group_94" data-name="Group 94">
              <g id="Group_93" data-name="Group 93">
                <path id="Path_110" data-name="Path 110" class="cls-2" d="M239.3 244.171l8.269 22.175 6.765 22.926 54.5-15.41-7.893-25.557-9.02-24.806z" transform="translate(-239.3 -223.5)"/>
              </g>
              <path id="Path_111" data-name="Path 111" class="cls-3" d="M254.238 235.4l-5.638 1.879 2.631 9.02 5.638-1.879z" transform="translate(-213.647 -190.675)"/>
              <path id="Path_112" data-name="Path 112" class="cls-3" d="M252.562 231.2l-5.262 1.879 1.5 4.134 1.5 4.51 5.262-1.879-1.5-4.51z" transform="translate(-217.233 -202.26)"/>
              <path id="Path_113" data-name="Path 113" class="cls-3" d="M250.962 227l-5.262 1.879 3.383 8.644 5.262-1.879z" transform="translate(-221.646 -213.845)"/>
            </g>
          </g>
          <g id="Group_98" data-name="Group 98" transform="translate(914.425 890.371)">
            <g id="Group_97" data-name="Group 97">
              <g id="Group_96" data-name="Group 96">
                <path id="Path_114" data-name="Path 114" class="cls-2" d="M243.3 252.309l1.879 5.638 1.5 6.013 3.007 11.651c.752 3.758 1.879 7.893 3.007 11.651l2.631 12.027 55.249-11.651-2.631-12.4c-.752-4.134-1.879-8.644-3.007-12.779l-3.007-12.779-1.5-6.389-1.879-6.389z" transform="translate(-243.3 -236.9)"/>
              </g>
              <path id="Path_115" data-name="Path 115" class="cls-3" d="M257.638 248.5L252 249.628l1.879 9.02 5.638-1.128z" transform="translate(-219.302 -204.902)"/>
              <path id="Path_116" data-name="Path 116" class="cls-3" d="M256.262 244.1L251 245.6l2.255 9.02 5.262-1.5z" transform="translate(-222.06 -217.039)"/>
              <path id="Path_117" data-name="Path 117" class="cls-3" d="M255.162 239.8l-5.262 1.5c1.128 3.007 1.5 6.014 2.255 9.02l5.638-1.5a81.616 81.616 0 0 0-2.631-9.02z" transform="translate(-225.094 -228.901)"/>
            </g>
          </g>
          <g id="Group_101" data-name="Group 101" transform="translate(925.7 941.11)">
            <g id="Group_100" data-name="Group 100">
              <g id="Group_99" data-name="Group 99">
                <path id="Path_118" data-name="Path 118" class="cls-2" d="M246.3 262.051l5.262 24.43c1.879 8.269 3.383 16.537 5.262 25.181l54.876-12.027c-1.879-7.893-3.383-16.161-5.262-24.43l-5.265-24.805z" transform="translate(-246.3 -250.4)"/>
              </g>
              <path id="Path_119" data-name="Path 119" class="cls-3" d="M260.338 261.6l-5.638 1.128c.752 3.007 1.128 6.014 1.879 9.02l5.638-1.128c-.752-3.006-1.128-6.013-1.879-9.02z" transform="translate(-223.129 -219.506)"/>
              <path id="Rectangle_23" data-name="Rectangle 23" class="cls-4" transform="matrix(.98 -.201 .201 .98 28.35 26.633)" d="M0 0h5.638v9.396H0z"/>
              <path id="Path_120" data-name="Path 120" class="cls-3" d="M258.538 252.9l-5.638 1.128 2.255 9.02 5.262-1.128z" transform="translate(-228.094 -243.504)"/>
            </g>
          </g>
          <g id="Group_104" data-name="Group 104" transform="translate(936.224 990.345)">
            <g id="Group_103" data-name="Group 103">
              <g id="Group_102" data-name="Group 102">
                <path id="Path_121" data-name="Path 121" class="cls-2" d="M249.1 275.527c1.879 8.644 3.758 16.913 6.014 25.557l7.141 25.557 54.121-16.161-6.389-23.3-5.638-23.68z" transform="translate(-249.1 -263.5)"/>
              </g>
              <path id="Path_122" data-name="Path 122" class="cls-3" d="M263.162 274.6l-5.262 1.5 2.631 9.02 5.262-1.5z" transform="translate(-224.826 -232.881)"/>
              <path id="Path_123" data-name="Path 123" class="cls-3" d="M262.338 270.3l-5.638 1.5 2.255 9.02 5.638-1.5z" transform="translate(-228.136 -244.743)"/>
              <path id="Path_124" data-name="Path 124" class="cls-3" d="M261.338 266l-5.638 1.127 2.255 9.02 5.262-1.128z" transform="translate(-230.894 -256.604)"/>
            </g>
          </g>
          <g id="Group_107" data-name="Group 107" transform="translate(949.378 1036.95)">
            <g id="Group_106" data-name="Group 106">
              <g id="Group_105" data-name="Group 105">
                <path id="Path_125" data-name="Path 125" class="cls-2" d="M252.6 292.061l1.879 6.389 2.255 6.389 4.51 12.4c3.007 8.269 5.638 16.913 9.4 24.806L322.883 321c-3.383-7.141-5.638-15.034-8.269-22.551l-3.758-11.275-1.879-5.638-1.5-5.638z" transform="translate(-252.6 -275.9)"/>
              </g>
              <path id="Path_126" data-name="Path 126" class="cls-3" d="M267.262 287.3L262 289.179c1.127 3.007 2.255 6.013 3.383 8.644l5.262-1.879c-1.128-2.63-2.256-5.637-3.383-8.644z" transform="translate(-226.671 -244.454)"/>
              <path id="Path_127" data-name="Path 127" class="cls-3" d="M266.138 283.1l-5.638 1.879 3.383 9.02 5.262-1.879z" transform="translate(-230.808 -256.039)"/>
              <path id="Path_128" data-name="Path 128" class="cls-3" d="M264.462 278.9l-5.262 1.5a84.552 84.552 0 0 0 3.007 9.02l5.262-1.879a58.428 58.428 0 0 1-3.007-8.641z" transform="translate(-234.394 -267.625)"/>
            </g>
          </g>
          <g id="Group_110" data-name="Group 110" transform="translate(967.043 1082.051)">
            <g id="Group_109" data-name="Group 109">
              <g id="Group_108" data-name="Group 108">
                <path id="Path_129" data-name="Path 129" class="cls-2" d="M257.3 308.947l10.148 24.43c1.5 4.134 3.758 7.893 5.638 12.027l6.013 11.651 50.363-25.182-5.262-10.9c-1.879-3.758-3.758-7.141-5.262-10.9l-9.4-22.175z" transform="translate(-257.3 -287.9)"/>
              </g>
              <path id="Path_130" data-name="Path 130" class="cls-3" d="M272.562 299.6l-5.262 2.631 4.134 8.269 5.262-2.631z" transform="translate(-229.716 -255.626)"/>
              <path id="Path_131" data-name="Path 131" class="cls-3" d="M270.386 295.6l-4.886 2.255 3.383 8.644 5.262-2.631z" transform="translate(-234.681 -266.66)"/>
              <path id="Path_132" data-name="Path 132" class="cls-3" d="M268.962 291.5l-5.262 1.879 3.758 8.644 5.262-1.879z" transform="translate(-239.646 -277.97)"/>
            </g>
          </g>
          <g id="Group_113" data-name="Group 113" transform="translate(988.466 1126.024)">
            <g id="Group_112" data-name="Group 112">
              <g id="Group_111" data-name="Group 111">
                <path id="Path_133" data-name="Path 133" class="cls-2" d="M263 324.781l12.027 23.3 12.779 22.551 48.859-28.188-12.027-21.044-10.9-21.8z" transform="translate(-263 -299.6)"/>
              </g>
              <path id="Path_134" data-name="Path 134" class="cls-3" d="M278.386 311.5l-4.886 2.631 4.886 8.268 4.886-3.007z" transform="translate(-234.037 -266.775)"/>
              <path id="Path_135" data-name="Path 135" class="cls-3" d="M276.562 307.6l-5.262 2.631 2.255 4.134 2.255 4.134 4.886-2.631-2.255-4.134z" transform="translate(-240.105 -277.533)"/>
              <path id="Path_136" data-name="Path 136" class="cls-3" d="M274.562 303.6l-5.262 2.631 4.51 8.269 4.886-2.631z" transform="translate(-245.622 -288.566)"/>
            </g>
          </g>
          <g id="Group_116" data-name="Group 116" transform="translate(1013.272 1169.246)">
            <g id="Group_115" data-name="Group 115">
              <g id="Group_114" data-name="Group 114">
                <path id="Path_137" data-name="Path 137" class="cls-2" d="M269.6 338.912l13.154 22.55c4.51 7.141 9.4 14.282 13.906 21.8l47.356-30.443c-4.51-6.765-9.02-13.53-13.53-20.671l-12.4-21.047z" transform="translate(-269.6 -311.1)"/>
              </g>
              <path id="Path_138" data-name="Path 138" class="cls-3" d="M285.286 323l-4.886 3.007 5.262 7.893 4.51-3.007z" transform="translate(-239.809 -278.275)"/>
              <path id="Path_139" data-name="Path 139" class="cls-3" d="M282.886 319.2L278 322.207a55.6 55.6 0 0 0 4.886 7.893l4.886-3.007a90 90 0 0 1-4.886-7.893z" transform="translate(-246.429 -288.757)"/>
              <path id="Path_140" data-name="Path 140" class="cls-3" d="M280.686 315.4l-4.886 2.631 4.51 8.268 4.886-3.007z" transform="translate(-252.498 -299.239)"/>
            </g>
          </g>
          <g id="Group_119" data-name="Group 119" transform="translate(1040.332 1210.589)">
            <g id="Group_118" data-name="Group 118">
              <g id="Group_117" data-name="Group 117">
                <path id="Path_141" data-name="Path 141" class="cls-2" d="M276.8 352.543l14.282 21.423c2.255 3.759 4.51 7.141 7.141 10.9l7.517 10.523 46.229-32.322-7.141-10.148-6.765-10.148-13.531-20.671z" transform="translate(-276.8 -322.1)"/>
              </g>
              <path id="Path_142" data-name="Path 142" class="cls-3" d="M292.31 334.2l-4.51 3.007 5.262 7.893 4.886-3.383z" transform="translate(-246.457 -288.723)"/>
              <path id="Path_143" data-name="Path 143" class="cls-3" d="M290.186 330.5l-4.886 3.007 5.262 7.893 4.51-3.383z" transform="translate(-253.353 -298.929)"/>
              <path id="Path_144" data-name="Path 144" class="cls-3" d="M287.41 326.7l-4.51 3.383 4.886 7.517 4.886-3.007z" transform="translate(-259.974 -309.411)"/>
            </g>
          </g>
          <g id="Group_122" data-name="Group 122" transform="translate(1069.272 1251.556)">
            <g id="Group_121" data-name="Group 121">
              <g id="Group_120" data-name="Group 120">
                <path id="Path_145" data-name="Path 145" class="cls-2" d="M284.5 365.322l30.067 41.719 45.1-33.826L330.728 333z" transform="translate(-284.5 -333)"/>
              </g>
              <path id="Path_146" data-name="Path 146" class="cls-3" d="M300.21 345l-4.51 3.383 5.262 7.893 4.51-3.383z" transform="translate(-253.606 -299.899)"/>
              <path id="Path_147" data-name="Path 147" class="cls-3" d="M297.886 341.4L293 344.783l5.638 7.517 4.51-3.383z" transform="translate(-261.053 -309.829)"/>
              <path id="Path_148" data-name="Path 148" class="cls-3" d="M294.91 337.8l-4.51 3.383 5.638 7.517 4.51-3.383z" transform="translate(-268.225 -319.76)"/>
            </g>
          </g>
          <g id="Group_125" data-name="Group 125" transform="translate(1099.34 1291.395)">
            <g id="Group_124" data-name="Group 124">
              <g id="Group_123" data-name="Group 123">
                <path id="Path_149" data-name="Path 149" class="cls-2" d="M292.5 377.8c10.148 13.53 21.047 27.061 31.195 40.215l44.349-34.953C357.9 369.909 347.373 357.13 337.6 343.6z" transform="translate(-292.5 -343.6)"/>
              </g>
              <path id="Rectangle_24" data-name="Rectangle 24" class="cls-4" transform="rotate(-37.786 92.76 -37.44)" d="M0 0h5.638v9.396H0z"/>
              <path id="Path_150" data-name="Path 150" class="cls-3" d="M305.51 352.2l-4.51 3.383 6.013 7.517 4.51-3.383z" transform="translate(-269.053 -319.878)"/>
              <path id="Path_151" data-name="Path 151" class="cls-3" d="M302.81 348.7l-4.51 3.383c1.879 2.631 3.758 4.886 5.638 7.517l4.51-3.383c-1.879-2.631-3.759-4.886-5.638-7.517z" transform="translate(-276.501 -329.532)"/>
            </g>
          </g>
          <g id="Group_128" data-name="Group 128" transform="translate(1130.534 1330.859)">
            <g id="Group_127" data-name="Group 127">
              <g id="Group_126" data-name="Group 126">
                <path id="Path_152" data-name="Path 152" class="cls-2" d="M300.8 389.053l30.819 39.463 44.725-34.2-31.195-40.216z" transform="translate(-300.8 -354.1)"/>
              </g>
              <path id="Path_153" data-name="Path 153" class="cls-3" d="M316.234 366.3l-4.134 3.383 5.638 7.517 4.51-3.758z" transform="translate(-269.63 -320.447)"/>
              <path id="Path_154" data-name="Path 154" class="cls-3" d="M313.81 362.8l-4.51 3.383 5.638 7.517 4.51-3.758z" transform="translate(-277.353 -330.102)"/>
              <path id="Path_155" data-name="Path 155" class="cls-3" d="M310.734 359.3l-4.134 3.383 5.638 7.141 4.51-3.383z" transform="translate(-284.801 -339.756)"/>
            </g>
          </g>
          <g id="Group_131" data-name="Group 131" transform="translate(1161.354 1370.698)">
            <g id="Group_130" data-name="Group 130">
              <g id="Group_129" data-name="Group 129">
                <path id="Path_156" data-name="Path 156" class="cls-2" d="M309 399.277c2.631 3.007 4.886 6.389 7.141 9.4l7.141 9.772 6.389 9.772c2.255 3.383 4.51 6.39 6.389 9.772l48.108-29.316c-2.255-3.758-4.51-7.517-7.141-11.275l-7.517-11.275-7.893-10.9c-2.631-3.758-5.262-7.141-7.893-10.523z" transform="translate(-309 -364.7)"/>
              </g>
              <path id="Path_157" data-name="Path 157" class="cls-3" d="M324.786 377.1l-4.886 3.007c1.5 2.631 3.383 5.262 4.886 7.893l4.886-3.007c-1.503-2.631-3.383-5.262-4.886-7.893z" transform="translate(-278.933 -330.496)"/>
              <path id="Path_158" data-name="Path 158" class="cls-3" d="M321.91 373.4l-4.51 3.382a91.086 91.086 0 0 1 5.262 7.517l4.51-3.007c-1.503-2.63-3.383-5.261-5.262-7.892z" transform="translate(-285.829 -340.702)"/>
              <path id="Path_159" data-name="Path 159" class="cls-3" d="M319.31 369.8l-4.51 3.383c1.879 2.255 3.758 4.886 5.638 7.517l4.51-3.383c-1.879-2.255-3.759-4.886-5.638-7.517z" transform="translate(-293.001 -350.632)"/>
            </g>
          </g>
          <g id="Group_134" data-name="Group 134" transform="translate(1188.414 1415.047)">
            <g id="Group_133" data-name="Group 133">
              <g id="Group_132" data-name="Group 132">
                <path id="Path_160" data-name="Path 160" class="cls-2" d="M316.2 405.816a301.414 301.414 0 0 1 21.047 40.967l52.242-21.423a350.309 350.309 0 0 0-24.806-48.86z" transform="translate(-316.2 -376.5)"/>
              </g>
              <path id="Path_161" data-name="Path 161" class="cls-3" d="M331.662 388.9l-5.262 2.255c1.127 2.631 2.631 5.638 3.758 8.269l5.262-2.255c-1.127-2.631-2.631-5.262-3.758-8.269z" transform="translate(-288.064 -342.295)"/>
              <path id="Path_162" data-name="Path 162" class="cls-3" d="M329.286 384.9l-4.886 2.631a56.6 56.6 0 0 1 4.134 8.269l4.886-2.631a56.588 56.588 0 0 0-4.134-8.269z" transform="translate(-293.581 -353.329)"/>
              <path id="Path_163" data-name="Path 163" class="cls-3" d="M327.186 381l-4.886 3.007c1.5 2.631 3.383 5.262 4.886 7.893l4.886-2.631c-1.879-3.007-3.383-5.638-4.886-8.269z" transform="translate(-299.374 -364.087)"/>
            </g>
          </g>
          <g id="Group_137" data-name="Group 137" transform="translate(1209.086 1463.531)">
            <g id="Group_136" data-name="Group 136">
              <g id="Group_135" data-name="Group 135">
                <path id="Path_164" data-name="Path 164" class="cls-2" d="M321.7 410.823c5.638 13.906 10.148 28.188 12.4 42.094l55.625-9.02a239.594 239.594 0 0 0-15.785-54.5z" transform="translate(-321.7 -389.4)"/>
              </g>
              <path id="Path_165" data-name="Path 165" class="cls-3" d="M336.338 401.6l-5.638 1.128c.752 3.007 1.127 6.013 1.879 9.02l5.638-1.127a42.979 42.979 0 0 0-1.879-9.021z" transform="translate(-296.874 -355.747)"/>
              <path id="Path_166" data-name="Path 166" class="cls-3" d="M334.862 397.3l-5.262 1.5a81.658 81.658 0 0 1 2.631 9.02l5.262-1.5a81.638 81.638 0 0 0-2.631-9.02z" transform="translate(-299.908 -367.609)"/>
              <path id="Path_167" data-name="Path 167" class="cls-3" d="M333.362 393.1l-5.262 1.879c1.128 3.007 2.255 5.638 3.383 8.644l5.262-1.879a59.049 59.049 0 0 0-3.383-8.644z" transform="translate(-304.046 -379.194)"/>
            </g>
          </g>
          <g id="Group_140" data-name="Group 140" transform="translate(1221.488 1518.404)">
            <g id="Group_139" data-name="Group 139">
              <g id="Group_138" data-name="Group 138">
                <path id="Path_168" data-name="Path 168" class="cls-2" d="M325 413.02a141.6 141.6 0 0 1 .752 41.719l56 7.893A204.183 204.183 0 0 0 381 404z" transform="translate(-325 -404)"/>
              </g>
              <path id="Path_169" data-name="Path 169" class="cls-3" d="M338.189 415.376l-5.637-.376a72.972 72.972 0 0 1-.752 9.02l5.638.752c0-3.007.751-6.389.751-9.396z" transform="translate(-306.243 -373.657)"/>
              <path id="Path_170" data-name="Path 170" class="cls-3" d="M337.638 410.6l-5.638.376c0 3.007.376 6.014.376 9.02h5.638c0-3.007-.376-6.389-.376-9.396z" transform="translate(-305.691 -385.794)"/>
              <path id="Path_171" data-name="Path 171" class="cls-3" d="M337.238 406.1l-5.638.752 1.128 9.02 5.638-.376z" transform="translate(-306.794 -398.207)"/>
            </g>
          </g>
          <g id="Group_143" data-name="Group 143" transform="translate(1210.213 1569.143)">
            <g id="Group_142" data-name="Group 142">
              <g id="Group_141" data-name="Group 141">
                <path id="Path_172" data-name="Path 172" class="cls-2" d="M334.027 417.5A141.4 141.4 0 0 1 322 457.715l51.115 23.678a192.474 192.474 0 0 0 16.537-56z" transform="translate(-322 -417.5)"/>
              </g>
              <path id="Path_173" data-name="Path 173" class="cls-3" d="M336.944 429.679l-5.262-1.879-3.383 8.269 5.262 2.255z" transform="translate(-304.622 -389.088)"/>
              <path id="Path_174" data-name="Path 174" class="cls-3" d="M337.793 425.1l-5.262-1.5-1.128 4.51-1.5 4.51 5.262 1.5 1.5-4.51z" transform="translate(-300.208 -400.674)"/>
              <path id="Path_175" data-name="Path 175" class="cls-3" d="M338.517 420.152l-5.638-.752-1.879 9.02 5.638 1.128z" transform="translate(-297.174 -412.259)"/>
            </g>
          </g>
          <g id="Group_146" data-name="Group 146" transform="translate(1186.911 1609.358)">
            <g id="Group_145" data-name="Group 145">
              <g id="Group_144" data-name="Group 144">
                <path id="Path_176" data-name="Path 176" class="cls-2" d="M339.1 428.2a176 176 0 0 1-23.3 37.208l44.725 34.578a271.075 271.075 0 0 0 29.692-48.108z" transform="translate(-315.8 -428.2)"/>
              </g>
              <path id="Path_177" data-name="Path 177" class="cls-3" d="M331.372 442.407l-4.51-3.007-5.262 7.141 4.51 3.383z" transform="translate(-299.801 -397.306)"/>
              <path id="Path_178" data-name="Path 178" class="cls-3" d="M333.872 438.607l-4.886-3.007c-1.5 2.631-3.383 5.262-4.886 7.893l4.886 3.007a72.494 72.494 0 0 0 4.886-7.893z" transform="translate(-292.905 -407.788)"/>
              <path id="Path_179" data-name="Path 179" class="cls-3" d="M335.42 434.431l-4.886-2.631c-1.5 2.631-2.631 5.638-4.134 8.269l4.886 2.631c1.503-2.631 2.631-5.638 4.134-8.269z" transform="translate(-286.561 -418.27)"/>
            </g>
          </g>
          <g id="Group_149" data-name="Group 149" transform="translate(1155.716 1646.566)">
            <g id="Group_148" data-name="Group 148">
              <g id="Group_147" data-name="Group 147">
                <path id="Path_180" data-name="Path 180" class="cls-2" d="M338.695 438.1a332.894 332.894 0 0 1-31.195 34.2l39.088 40.591a421.373 421.373 0 0 0 36.833-40.215z" transform="translate(-307.5 -438.1)"/>
              </g>
              <path id="Path_181" data-name="Path 181" class="cls-3" d="M323.324 453.634l-4.134-4.134-6.389 6.389 3.758 4.134z" transform="translate(-292.88 -406.654)"/>
              <path id="Path_182" data-name="Path 182" class="cls-3" d="M326.324 450.058l-4.134-3.758c-1.879 2.255-4.134 4.51-6.389 6.765l4.134 3.758c2.254-2.254 4.509-4.509 6.389-6.765z" transform="translate(-284.605 -415.481)"/>
              <path id="Path_183" data-name="Path 183" class="cls-3" d="M329.224 446.283l-4.51-3.383c-1.879 2.255-3.758 4.886-6.013 7.141l4.134 3.758a39.893 39.893 0 0 0 6.389-7.516z" transform="translate(-276.606 -424.859)"/>
            </g>
          </g>
          <g id="Group_152" data-name="Group 152" transform="translate(1119.635 1680.768)">
            <g id="Group_151" data-name="Group 151">
              <g id="Group_150" data-name="Group 150">
                <path id="Path_184" data-name="Path 184" class="cls-2" d="M333.981 447.2c-11.275 10.9-23.678 21.047-36.081 31.195l34.953 44.349a575.544 575.544 0 0 0 40.215-34.578z" transform="translate(-297.9 -447.2)"/>
              </g>
              <path id="Path_185" data-name="Path 185" class="cls-3" d="M313.6 462.91l-3.759-4.51c-2.255 1.879-4.886 4.134-7.141 6.014l3.383 4.51c2.63-1.88 5.261-4.135 7.517-6.014z" transform="translate(-284.66 -416.306)"/>
              <path id="Path_186" data-name="Path 186" class="cls-3" d="M316.724 459.734l-3.758-4.134-6.765 6.013 3.383 4.134z" transform="translate(-275.005 -424.029)"/>
              <path id="Path_187" data-name="Path 187" class="cls-3" d="M320.023 456.734l-3.758-4.134-6.765 6.389 3.759 4.134z" transform="translate(-265.902 -432.305)"/>
            </g>
          </g>
          <g id="Group_155" data-name="Group 155" transform="translate(1080.547 1711.963)">
            <g id="Group_154" data-name="Group 154">
              <g id="Group_153" data-name="Group 153">
                <path id="Path_188" data-name="Path 188" class="cls-2" d="M326.588 455.5c-12.779 10.148-25.557 19.544-39.088 28.94l32.322 46.229c14.282-9.772 28.188-20.3 41.719-30.819z" transform="translate(-287.5 -455.5)"/>
              </g>
              <path id="Path_189" data-name="Path 189" class="cls-3" d="M302.9 471.11l-3.007-4.51-7.893 5.262 3.383 4.51z" transform="translate(-275.087 -424.881)"/>
              <path id="Path_190" data-name="Path 190" class="cls-3" d="M306.6 468.41l-3.383-4.51c-2.631 1.879-4.886 3.758-7.517 5.638l3.382 4.51c2.256-1.88 4.886-3.759 7.518-5.638z" transform="translate(-264.881 -432.329)"/>
              <path id="Path_191" data-name="Path 191" class="cls-3" d="M310.1 465.71l-3.383-4.51c-2.255 1.879-4.886 3.759-7.517 5.638l3.383 4.51a49 49 0 0 0 7.517-5.638z" transform="translate(-255.226 -439.777)"/>
            </g>
          </g>
          <g id="Group_158" data-name="Group 158" transform="translate(1039.581 1740.903)">
            <g id="Group_157" data-name="Group 157">
              <g id="Group_156" data-name="Group 156">
                <path id="Path_192" data-name="Path 192" class="cls-2" d="M317.567 463.2c-13.53 9.4-27.061 18.416-40.967 27.437l30.819 47.356c14.282-9.4 28.564-18.792 42.846-28.564z" transform="translate(-276.6 -463.2)"/>
              </g>
              <path id="Path_193" data-name="Path 193" class="cls-3" d="M291.9 478.986l-3.383-4.886-7.517 5.262 3.007 4.51z" transform="translate(-264.463 -433.133)"/>
              <path id="Path_194" data-name="Path 194" class="cls-3" d="M295.6 476.21l-3.382-4.51-7.517 4.886 3.007 4.886z" transform="translate(-254.257 -439.753)"/>
              <path id="Path_195" data-name="Path 195" class="cls-3" d="M299.3 473.986l-3.383-4.886-7.517 5.638 3.007 4.51z" transform="translate(-244.051 -446.925)"/>
            </g>
          </g>
          <g id="Group_161" data-name="Group 161" transform="translate(997.486 1768.339)">
            <g id="Group_160" data-name="Group 160">
              <g id="Group_159" data-name="Group 159">
                <path id="Path_196" data-name="Path 196" class="cls-2" d="M307.494 470.5c-13.906 9.02-28.188 18.04-42.094 26.685l30.067 47.732c14.282-9.02 28.564-18.04 42.846-27.436z" transform="translate(-265.4 -470.5)"/>
              </g>
              <path id="Rectangle_25" data-name="Rectangle 25" class="cls-4" transform="rotate(-32.22 87.219 -5.14)" d="M0 0h9.396v5.638H0z"/>
              <path id="Path_197" data-name="Path 197" class="cls-3" d="M284.3 483.51l-3.007-4.51-7.893 4.886 3.007 4.886z" transform="translate(-243.333 -447.053)"/>
              <path id="Path_198" data-name="Path 198" class="cls-3" d="M288.1 481.11l-3.007-4.51-7.893 4.886 3.007 4.886z" transform="translate(-232.85 -453.674)"/>
            </g>
          </g>
          <g id="Group_164" data-name="Group 164" transform="translate(954.64 1795.4)">
            <g id="Group_163" data-name="Group 163">
              <g id="Group_162" data-name="Group 162">
                <path id="Path_199" data-name="Path 199" class="cls-2" d="M296.47 477.7L254 504.385l29.692 47.732 42.846-26.685z" transform="translate(-254 -477.7)"/>
              </g>
              <path id="Rectangle_26" data-name="Rectangle 26" class="cls-4" transform="rotate(-32.013 87.01 -5.298)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_27" data-name="Rectangle 27" class="cls-4" transform="rotate(-31.993 78.996 -34.936)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_28" data-name="Rectangle 28" class="cls-4" transform="rotate(-32.059 70.504 -63.85)" d="M0 0h9.396v5.638H0z"/>
            </g>
          </g>
          <g id="Group_167" data-name="Group 167" transform="translate(911.794 1822.085)">
            <g id="Group_166" data-name="Group 166">
              <g id="Group_165" data-name="Group 165">
                <path id="Path_200" data-name="Path 200" class="cls-2" d="M285.446 484.8c-14.282 9.02-28.564 18.04-42.846 27.436l30.819 47.356c13.906-9.02 27.812-18.04 42.094-26.685z" transform="translate(-242.6 -484.8)"/>
              </g>
              <path id="Rectangle_29" data-name="Rectangle 29" class="cls-4" transform="rotate(-32.649 86.3 -5.34)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_30" data-name="Rectangle 30" class="cls-4" transform="rotate(-32.33 78.724 -34.26)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_31" data-name="Rectangle 31" class="cls-4" transform="rotate(-32.134 70.243 -63.819)" d="M0 0h9.396v5.638H0z"/>
            </g>
          </g>
          <g id="Group_170" data-name="Group 170" transform="translate(869.324 1849.521)">
            <g id="Group_169" data-name="Group 169">
              <g id="Group_168" data-name="Group 168">
                <path id="Path_201" data-name="Path 201" class="cls-2" d="M273.77 492.1c-14.282 9.4-28.564 18.792-42.47 28.564l31.947 46.229c13.53-9.4 27.061-18.416 41.343-27.436z" transform="translate(-231.3 -492.1)"/>
              </g>
              <path id="Path_202" data-name="Path 202" class="cls-3" d="M246.975 507.886L243.593 503l-7.893 5.262 3.383 4.886z" transform="translate(-219.163 -462.033)"/>
              <path id="Path_203" data-name="Path 203" class="cls-3" d="M250.4 505.386l-3.382-4.886-7.517 5.262 3.007 4.886z" transform="translate(-208.681 -468.929)"/>
              <path id="Path_204" data-name="Path 204" class="cls-3" d="M254.1 502.61l-3.007-4.51-7.893 4.886 3.007 4.886z" transform="translate(-198.475 -475.549)"/>
            </g>
          </g>
          <g id="Group_173" data-name="Group 173" transform="translate(827.229 1877.709)">
            <g id="Group_172" data-name="Group 172">
              <g id="Group_171" data-name="Group 171">
                <path id="Path_205" data-name="Path 205" class="cls-2" d="M261.819 499.6Q240.4 514.258 220.1 530.043l34.577 44.725c12.779-9.772 25.933-19.544 39.464-28.94z" transform="translate(-220.1 -499.6)"/>
              </g>
              <path id="Path_206" data-name="Path 206" class="cls-3" d="M235.7 515.31l-3.383-4.51c-2.631 1.879-4.886 3.758-7.517 5.638l3.383 4.51c2.63-1.879 5.261-3.759 7.517-5.638z" transform="translate(-207.135 -468.706)"/>
              <path id="Path_207" data-name="Path 207" class="cls-3" d="M239.3 512.71l-3.383-4.51c-2.631 1.879-5.262 3.758-7.517 5.638l3.383 4.51c2.63-2.255 5.261-3.759 7.517-5.638z" transform="translate(-197.205 -475.878)"/>
              <path id="Path_208" data-name="Path 208" class="cls-3" d="M243 510.11l-3.383-4.51-7.517 5.262 3.007 4.51z" transform="translate(-186.999 -483.049)"/>
            </g>
          </g>
          <g id="Group_176" data-name="Group 176" transform="translate(786.639 1908.528)">
            <g id="Group_175" data-name="Group 175">
              <g id="Group_174" data-name="Group 174">
                <path id="Path_209" data-name="Path 209" class="cls-2" d="M249.891 507.8c-13.906 10.524-27.437 21.8-40.591 33.45l37.584 42.095c11.651-10.524 24.43-20.671 37.208-30.819z" transform="translate(-209.3 -507.8)"/>
              </g>
              <path id="Path_210" data-name="Path 210" class="cls-3" d="M225.3 523.334l-3.758-4.134-7.141 6.389 3.758 4.134z" transform="translate(-195.232 -476.354)"/>
              <path id="Path_211" data-name="Path 211" class="cls-3" d="M228.424 520.81l-3.383-4.51c-2.631 1.879-4.886 4.134-7.141 6.013l3.758 4.134c1.88-1.503 4.135-3.757 6.766-5.637z" transform="translate(-185.577 -484.353)"/>
              <path id="Path_212" data-name="Path 212" class="cls-3" d="M232.2 518.01l-3.383-4.51c-2.631 1.879-4.886 3.758-7.517 6.013l3.383 4.51c2.63-1.879 4.885-4.134 7.517-6.013z" transform="translate(-176.199 -492.077)"/>
            </g>
          </g>
          <g id="Group_179" data-name="Group 179" transform="translate(748.678 1941.979)">
            <g id="Group_178" data-name="Group 178">
              <g id="Group_177" data-name="Group 177">
                <path id="Path_213" data-name="Path 213" class="cls-2" d="M237.16 516.7a511.279 511.279 0 0 0-37.96 37.584l42.094 37.584c10.524-11.651 21.8-22.551 33.45-33.45z" transform="translate(-199.2 -516.7)"/>
              </g>
              <path id="Path_214" data-name="Path 214" class="cls-3" d="M215.224 532.258l-3.758-3.758-6.765 6.765 4.134 3.759z" transform="translate(-184.029 -484.151)"/>
              <path id="Path_215" data-name="Path 215" class="cls-3" d="M218.7 529.058l-4.134-3.759-6.765 6.389 4.134 4.134z" transform="translate(-175.477 -492.978)"/>
              <path id="Path_216" data-name="Path 216" class="cls-3" d="M221.624 526.334l-3.758-4.134-6.765 6.389 3.758 4.134z" transform="translate(-166.375 -501.529)"/>
            </g>
          </g>
          <g id="Group_182" data-name="Group 182" transform="translate(715.228 1979.563)">
            <g id="Group_181" data-name="Group 181">
              <g id="Group_180" data-name="Group 180">
                <path id="Path_217" data-name="Path 217" class="cls-2" d="M223.75 526.7a347.882 347.882 0 0 0-33.45 43.222l46.98 30.819c8.269-12.779 18.04-24.806 28.188-36.457z" transform="translate(-190.3 -526.7)"/>
              </g>
              <path id="Path_218" data-name="Path 218" class="cls-3" d="M206.172 542.183l-4.51-3.383c-1.879 2.631-3.758 5.262-5.262 7.893l4.51 3.007c1.504-2.256 3.383-4.886 5.262-7.517z" transform="translate(-173.474 -493.323)"/>
              <path id="Path_219" data-name="Path 219" class="cls-3" d="M209.148 538.683l-4.51-3.383a56.028 56.028 0 0 0-5.638 7.517l4.51 3.383a35.736 35.736 0 0 1 5.638-7.517z" transform="translate(-166.302 -502.978)"/>
              <path id="Path_220" data-name="Path 220" class="cls-3" d="M211.948 535.559l-4.134-3.759c-1.879 2.255-4.134 4.51-6.014 7.141l4.134 3.759c1.88-2.631 4.135-4.886 6.014-7.141z" transform="translate(-158.578 -512.632)"/>
            </g>
          </g>
          <g id="Group_185" data-name="Group 185" transform="translate(689.295 2022.409)">
            <g id="Group_184" data-name="Group 184">
              <g id="Group_183" data-name="Group 183">
                <path id="Path_221" data-name="Path 221" class="cls-2" d="M209.333 538.1c-4.886 7.893-9.772 15.785-14.282 24.054l-6.013 10.9-2.631 4.886-3.007 4.886 48.108 29.692 3.758-6.013 3.383-6.013 6.013-11.275a206.091 206.091 0 0 1 11.651-19.544z" transform="translate(-183.4 -538.1)"/>
              </g>
              <path id="Path_222" data-name="Path 222" class="cls-3" d="M199 553.031l-4.89-2.631-4.51 7.893 4.886 3.007c1.503-2.631 3.007-5.638 4.514-8.269z" transform="translate(-166.298 -504.171)"/>
              <path id="Path_223" data-name="Path 223" class="cls-3" d="M201.1 549.131l-4.89-2.631-4.51 8.268 4.886 2.631z" transform="translate(-160.505 -514.929)"/>
              <path id="Path_224" data-name="Path 224" class="cls-3" d="M203.3 545.607l-4.51-3.007-4.886 7.893 4.886 3.006z" transform="translate(-154.436 -525.687)"/>
            </g>
          </g>
          <g id="Group_188" data-name="Group 188" transform="translate(662.61 2066.759)">
            <g id="Group_187" data-name="Group 187">
              <g id="Group_186" data-name="Group 186">
                <path id="Path_225" data-name="Path 225" class="cls-2" d="M203.361 549.9a308.147 308.147 0 0 1-27.061 36.833l42.47 37.208a300.325 300.325 0 0 0 32.7-44.349z" transform="translate(-176.3 -549.9)"/>
              </g>
              <path id="Path_226" data-name="Path 226" class="cls-3" d="M191.948 564.782l-4.134-3.382-6.014 6.765 4.134 3.759z" transform="translate(-161.129 -518.178)"/>
              <path id="Path_227" data-name="Path 227" class="cls-3" d="M194.748 561.183l-4.51-3.383c-1.879 2.631-3.758 4.886-5.638 7.517l4.51 3.383c1.879-2.256 3.758-4.886 5.638-7.517z" transform="translate(-153.405 -528.109)"/>
              <path id="Path_228" data-name="Path 228" class="cls-3" d="M197.248 557.207l-4.886-3.007a53.7 53.7 0 0 1-5.262 7.517l4.51 3.007c2.255-2.255 3.759-4.886 5.638-7.517z" transform="translate(-146.509 -538.039)"/>
            </g>
          </g>
          <g id="Group_191" data-name="Group 191" transform="translate(629.16 2103.591)">
            <g id="Group_190" data-name="Group 190">
              <g id="Group_189" data-name="Group 189">
                <path id="Path_229" data-name="Path 229" class="cls-2" d="M200.474 559.7a396.531 396.531 0 0 1-33.074 33.45l37.96 41.718a516.793 516.793 0 0 0 37.96-37.96z" transform="translate(-167.4 -559.7)"/>
              </g>
              <path id="Path_230" data-name="Path 230" class="cls-3" d="M183.124 575.234l-3.758-4.134c-2.255 2.255-4.51 4.134-6.765 6.389l3.758 4.134c2.255-2.255 4.134-4.51 6.765-6.389z" transform="translate(-153.056 -528.254)"/>
              <path id="Path_231" data-name="Path 231" class="cls-3" d="M186.224 571.758L182.089 568c-2.255 2.255-4.134 4.51-6.389 6.765l4.134 4.134c2.255-2.63 4.51-4.886 6.39-7.141z" transform="translate(-144.505 -536.805)"/>
              <path id="Path_232" data-name="Path 232" class="cls-3" d="M189.324 568.459l-4.134-3.759-6.389 7.141 4.134 3.759z" transform="translate(-135.954 -545.908)"/>
            </g>
          </g>
          <g id="Group_194" data-name="Group 194" transform="translate(591.952 2137.041)">
            <g id="Group_193" data-name="Group 193">
              <g id="Group_192" data-name="Group 192">
                <path id="Path_233" data-name="Path 233" class="cls-2" d="M194.708 568.6c-11.651 10.524-24.054 21.047-37.208 30.819l34.2 44.725q20.859-15.785 40.591-33.826z" transform="translate(-157.5 -568.6)"/>
              </g>
              <path id="Path_234" data-name="Path 234" class="cls-3" d="M173.2 584.31l-3.383-4.51c-2.255 1.879-4.886 3.758-7.517 5.638l3.383 4.51c2.63-1.879 5.261-3.759 7.517-5.638z" transform="translate(-144.26 -537.706)"/>
              <path id="Path_235" data-name="Path 235" class="cls-3" d="M176.7 581.234l-3.758-4.134c-2.255 1.879-4.886 4.134-7.141 6.013l3.383 4.51a56.673 56.673 0 0 1 7.516-6.389z" transform="translate(-134.605 -545.153)"/>
              <path id="Path_236" data-name="Path 236" class="cls-3" d="M180 578.234l-3.758-4.134a54.968 54.968 0 0 1-7.141 6.013l3.758 4.134a54.969 54.969 0 0 0 7.141-6.013z" transform="translate(-125.502 -553.428)"/>
            </g>
          </g>
          <g id="Group_197" data-name="Group 197" transform="translate(552.489 2167.86)">
            <g id="Group_196" data-name="Group 196">
              <g id="Group_195" data-name="Group 195">
                <path id="Path_237" data-name="Path 237" class="cls-2" d="M186.464 576.8c-12.779 9.772-25.933 19.544-39.464 28.564l31.947 46.6c14.282-9.772 28.188-19.92 42.094-30.443z" transform="translate(-147 -576.8)"/>
              </g>
              <path id="Path_238" data-name="Path 238" class="cls-3" d="M162.4 592.31l-3.007-4.51-7.893 5.262 3.383 4.886z" transform="translate(-134.587 -546.457)"/>
              <path id="Path_239" data-name="Path 239" class="cls-3" d="M166.1 589.71l-3.383-4.51-7.517 5.638 3.007 4.51z" transform="translate(-124.381 -553.629)"/>
              <path id="Path_240" data-name="Path 240" class="cls-3" d="M169.6 587.11l-3.383-4.51-7.517 5.638 3.383 4.51z" transform="translate(-114.726 -560.801)"/>
            </g>
          </g>
          <g id="Group_200" data-name="Group 200" transform="translate(511.146 2196.424)">
            <g id="Group_199" data-name="Group 199">
              <g id="Group_198" data-name="Group 198">
                <path id="Path_241" data-name="Path 241" class="cls-2" d="M177.343 584.4c-13.53 9.4-27.437 18.416-41.343 27.061l30.067 47.732Q187.49 645.662 208.913 631z" transform="translate(-136 -584.4)"/>
              </g>
              <path id="Rectangle_32" data-name="Rectangle 32" class="cls-4" transform="rotate(-32.86 85.841 -4.992)" d="M0 0h9.396v5.638H0z"/>
              <path id="Path_242" data-name="Path 242" class="cls-3" d="M155 597.686l-3.007-4.886-7.893 5.262 3.007 4.51z" transform="translate(-113.657 -561.229)"/>
              <path id="Path_243" data-name="Path 243" class="cls-3" d="M158.7 594.91l-3.007-4.51-7.893 4.886 3.007 4.886z" transform="translate(-103.451 -567.849)"/>
            </g>
          </g>
          <g id="Group_203" data-name="Group 203" transform="translate(468.676 2223.485)">
            <g id="Group_202" data-name="Group 202">
              <g id="Group_201" data-name="Group 201">
                <path id="Path_244" data-name="Path 244" class="cls-2" d="M167.17 591.6c-13.906 9.02-28.188 17.665-42.47 26.309l29.316 48.108c14.282-8.644 28.94-17.665 43.222-27.061z" transform="translate(-124.7 -591.6)"/>
              </g>
              <path id="Rectangle_33" data-name="Rectangle 33" class="cls-4" transform="rotate(-31.601 88.182 -5.565)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_34" data-name="Rectangle 34" class="cls-4" transform="rotate(-31.923 79.525 -35.037)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_35" data-name="Rectangle 35" class="cls-4" transform="rotate(-32.338 70.11 -62.955)" d="M0 0h9.396v5.638H0z"/>
            </g>
          </g>
          <g id="Group_206" data-name="Group 206" transform="translate(425.83 2249.794)">
            <g id="Group_205" data-name="Group 205">
              <g id="Group_204" data-name="Group 204">
                <path id="Path_245" data-name="Path 245" class="cls-2" d="M156.146 598.6L113.3 624.909l29.316 48.108 43.222-26.309z" transform="translate(-113.3 -598.6)"/>
              </g>
              <path id="Rectangle_36" data-name="Rectangle 36" class="cls-4" transform="rotate(-31.2 89.055 -5.589)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_37" data-name="Rectangle 37" class="cls-4" transform="rotate(-31.24 80.681 -36.21)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_38" data-name="Rectangle 38" class="cls-4" transform="rotate(-31.373 72.16 -65.552)" d="M0 0h9.396v5.638H0z"/>
            </g>
          </g>
          <g id="Group_209" data-name="Group 209" transform="translate(382.608 2276.103)">
            <g id="Group_208" data-name="Group 208">
              <g id="Group_207" data-name="Group 207">
                <path id="Path_246" data-name="Path 246" class="cls-2" d="M145.022 605.6c-14.282 8.644-28.94 17.665-43.222 26.685l29.692 47.732c14.282-8.644 28.188-17.289 42.846-26.309z" transform="translate(-101.8 -605.6)"/>
              </g>
              <path id="Path_247" data-name="Path 247" class="cls-3" d="M117 620.91l-3.007-4.51-7.893 4.886 3.007 4.51z" transform="translate(-89.939 -575.809)"/>
              <path id="Rectangle_39" data-name="Rectangle 39" class="cls-4" transform="rotate(-31.419 80.417 -36.063)" d="M0 0h9.396v5.638H0z"/>
              <path id="Rectangle_40" data-name="Rectangle 40" class="cls-4" transform="rotate(-31.24 71.748 -66.072)" d="M0 0h9.396v5.638H0z"/>
            </g>
          </g>
          <g id="Group_212" data-name="Group 212" transform="translate(339.386 2302.411)">
            <g id="Group_211" data-name="Group 211">
              <g id="Group_210" data-name="Group 210">
                <path id="Path_248" data-name="Path 248" class="cls-2" d="M133.522 612.6c-14.282 9.02-28.94 18.041-43.222 27.813l31.195 46.98c13.53-9.02 27.437-18.04 41.719-26.685z" transform="translate(-90.3 -612.6)"/>
              </g>
              <path id="Path_249" data-name="Path 249" class="cls-3" d="M105.7 628.386l-3.383-4.886-7.517 5.262 3.007 4.886z" transform="translate(-77.887 -582.533)"/>
              <path id="Path_250" data-name="Path 250" class="cls-3" d="M109.4 625.986l-3.007-4.886-7.893 5.262 3.007 4.51z" transform="translate(-67.681 -589.153)"/>
              <path id="Path_251" data-name="Path 251" class="cls-3" d="M113.2 623.586l-3.007-4.886-7.893 5.262 3.007 4.51z" transform="translate(-57.199 -595.773)"/>
            </g>
          </g>
          <g id="Group_215" data-name="Group 215" transform="translate(296.916 2330.224)">
            <g id="Group_214" data-name="Group 214">
              <g id="Group_213" data-name="Group 213">
                <path id="Path_252" data-name="Path 252" class="cls-2" d="M121.47 620c-14.282 9.4-28.564 19.544-42.47 30.067l33.826 45.1C125.6 685.4 139.135 676 152.665 666.98z" transform="translate(-79 -620)"/>
              </g>
              <path id="Path_253" data-name="Path 253" class="cls-3" d="M94.6 635.71l-3.383-4.51c-2.631 1.879-5.262 3.758-7.517 5.637l3.383 4.51a48.969 48.969 0 0 1 7.517-5.637z" transform="translate(-66.035 -589.106)"/>
              <path id="Path_254" data-name="Path 254" class="cls-3" d="M98.575 633.386l-3.382-4.886-7.893 5.638 3.383 4.51z" transform="translate(-56.105 -596.553)"/>
              <path id="Path_255" data-name="Path 255" class="cls-3" d="M101.9 630.886L98.893 626 91 631.262l3.383 4.886z" transform="translate(-45.899 -603.449)"/>
            </g>
          </g>
          <g id="Group_218" data-name="Group 218" transform="translate(255.949 2360.292)">
            <g id="Group_217" data-name="Group 217">
              <g id="Group_216" data-name="Group 216">
                <path id="Path_256" data-name="Path 256" class="cls-2" d="M109.067 628c-13.906 10.524-27.812 21.423-40.967 33.45l37.96 41.719a475.209 475.209 0 0 1 36.833-30.069z" transform="translate(-68.1 -628)"/>
              </g>
              <path id="Path_257" data-name="Path 257" class="cls-3" d="M84.1 643.91l-3.758-4.51-7.142 6.389 3.758 4.135z" transform="translate(-54.032 -596.554)"/>
              <path id="Path_258" data-name="Path 258" class="cls-3" d="M87.224 641.01l-3.383-4.51c-2.631 1.879-4.886 4.134-7.141 6.013l3.758 4.51c1.88-1.879 4.511-3.758 6.766-6.013z" transform="translate(-44.378 -604.553)"/>
              <path id="Path_259" data-name="Path 259" class="cls-3" d="M91 638.31l-3.383-4.51c-2.631 1.879-4.886 3.758-7.517 5.638l3.383 4.51c2.63-1.88 4.886-3.759 7.517-5.638z" transform="translate(-34.999 -612.001)"/>
            </g>
          </g>
          <g id="Group_221" data-name="Group 221" transform="translate(217.989 2393.742)">
            <g id="Group_220" data-name="Group 220">
              <g id="Group_219" data-name="Group 219">
                <path id="Path_260" data-name="Path 260" class="cls-2" d="M95.96 636.9A421.067 421.067 0 0 0 58 676.363l43.974 35.329a293.412 293.412 0 0 1 31.947-33.074z" transform="translate(-58 -636.9)"/>
              </g>
              <path id="Path_261" data-name="Path 261" class="cls-3" d="M73.948 652.658l-4.135-3.758c-2.255 2.255-4.134 4.886-6.013 7.141l4.51 3.758c1.503-2.631 3.759-4.886 5.638-7.141z" transform="translate(-42.001 -603.799)"/>
              <path id="Path_262" data-name="Path 262" class="cls-3" d="M77.6 649.634l-4.135-4.134-6.765 6.765 4.134 3.758c2.255-1.879 4.51-4.133 6.766-6.389z" transform="translate(-34.002 -613.178)"/>
              <path id="Path_263" data-name="Path 263" class="cls-3" d="M80.424 646.634l-3.759-4.134-6.765 6.39 3.758 4.134z" transform="translate(-25.175 -621.453)"/>
            </g>
          </g>
          <g id="Group_224" data-name="Group 224" transform="translate(187.545 2433.581)">
            <g id="Group_223" data-name="Group 223">
              <g id="Group_222" data-name="Group 222">
                <path id="Path_264" data-name="Path 264" class="cls-2" d="M80.343 647.5c-11.651 14.658-22.55 30.443-30.443 48.484l51.115 23.3c5.638-12.779 13.906-24.806 23.3-36.457z" transform="translate(-49.9 -647.5)"/>
              </g>
              <path id="Path_265" data-name="Path 265" class="cls-3" d="M65.7 662.531l-4.89-2.631c-1.5 2.631-3.007 5.638-4.51 8.644l5.262 2.631a36.586 36.586 0 0 1 4.138-8.644z" transform="translate(-32.246 -613.296)"/>
              <path id="Path_266" data-name="Path 266" class="cls-3" d="M68.272 659.107l-4.51-3.007c-1.879 2.631-3.758 5.262-5.262 7.893L63.386 667c1.127-3.007 3.007-5.263 4.886-7.893z" transform="translate(-26.178 -623.777)"/>
              <path id="Path_267" data-name="Path 267" class="cls-3" d="M71.048 655.782l-4.135-3.382-6.013 7.517 4.886 3.382z" transform="translate(-19.557 -633.984)"/>
            </g>
          </g>
          <g id="Group_227" data-name="Group 227" transform="translate(172.512 2482.065)">
            <g id="Group_226" data-name="Group 226">
              <g id="Group_225" data-name="Group 225">
                <path id="Path_268" data-name="Path 268" class="cls-2" d="M60.934 660.4A171.114 171.114 0 0 0 45.9 718.28l56.376 4.51a122.7 122.7 0 0 1 10.148-39.09z" transform="translate(-45.9 -660.4)"/>
              </g>
              <path id="Path_269" data-name="Path 269" class="cls-3" d="M59.541 673.552L53.9 672.8l-1.5 9.4 5.638.376z" transform="translate(-27.97 -626.196)"/>
              <path id="Path_270" data-name="Path 270" class="cls-3" d="M60.817 669.8l-5.262-1.5a38.164 38.164 0 0 0-2.255 9.4l5.638 1.127a38.585 38.585 0 0 1 1.879-9.027z" transform="translate(-25.488 -638.609)"/>
              <path id="Path_271" data-name="Path 271" class="cls-3" d="M63.144 666.255L57.883 664c-1.128 3.007-2.631 6.013-3.383 9.02l5.262 1.879c1.127-3.006 2.255-5.637 3.382-8.644z" transform="translate(-22.178 -650.47)"/>
            </g>
          </g>
          <g id="Group_230" data-name="Group 230" transform="translate(172.055 2539.944)">
            <g id="Group_229" data-name="Group 229">
              <g id="Group_228" data-name="Group 228">
                <path id="Path_272" data-name="Path 272" class="cls-2" d="M46.236 675.8a173.818 173.818 0 0 0 6.013 59.383l54.5-14.658a115.062 115.062 0 0 1-4.134-40.591z" transform="translate(-45.778 -675.8)"/>
              </g>
              <path id="Path_273" data-name="Path 273" class="cls-3" d="M58.538 686.2l-5.638 1.127c.752 3.007 1.128 6.39 1.879 9.4l5.638-1.5c-.752-3.014-1.128-6.02-1.879-9.027z" transform="translate(-26.134 -647.112)"/>
              <path id="Path_274" data-name="Path 274" class="cls-3" d="M57.938 681.8l-5.638.376 1.128 9.4 5.638-.752z" transform="translate(-27.789 -659.249)"/>
              <path id="Path_275" data-name="Path 275" class="cls-3" d="M58.213 677.676l-5.638-.376c0 1.5-.376 3.383-.376 4.886v4.886h5.638v-4.51c.001-1.88.376-3.383.376-4.886z" transform="translate(-28.065 -671.662)"/>
            </g>
          </g>
          <g id="Group_233" data-name="Group 233" transform="translate(178.149 2584.669)">
            <g id="Group_232" data-name="Group 232">
              <g id="Group_231" data-name="Group 231">
                <path id="Path_276" data-name="Path 276" class="cls-2" d="M47.4 702.358a261.53 261.53 0 0 0 21.423 52.618l49.611-27.061A193.218 193.218 0 0 1 101.9 687.7z" transform="translate(-47.4 -687.7)"/>
              </g>
              <path id="Path_277" data-name="Path 277" class="cls-3" d="M62.186 698.7l-4.886 2.631 4.134 8.268 4.886-2.631z" transform="translate(-20.092 -657.357)"/>
              <path id="Path_278" data-name="Path 278" class="cls-3" d="M60.762 694.7l-5.262 1.879c1.128 3.007 2.631 6.014 3.758 8.644l5.262-2.255a80.4 80.4 0 0 1-3.758-8.268z" transform="translate(-25.057 -668.391)"/>
              <path id="Path_279" data-name="Path 279" class="cls-3" d="M59.262 690.5L54 692a84.6 84.6 0 0 0 3.007 9.02l5.262-1.879a58.439 58.439 0 0 1-3.007-8.641z" transform="translate(-29.194 -679.976)"/>
            </g>
          </g>
          <g id="Group_236" data-name="Group 236" transform="translate(199.948 2624.885)">
            <g id="Group_235" data-name="Group 235">
              <g id="Group_234" data-name="Group 234">
                <path id="Path_280" data-name="Path 280" class="cls-2" d="M53.2 725.461a380.959 380.959 0 0 0 30.067 45.477l44.725-34.2a357.647 357.647 0 0 1-25.557-38.338z" transform="translate(-53.2 -698.4)"/>
              </g>
              <path id="Path_281" data-name="Path 281" class="cls-3" d="M68.81 710.1l-4.51 3.383L69.562 721l4.51-3.382z" transform="translate(-22.581 -666.126)"/>
              <path id="Path_282" data-name="Path 282" class="cls-3" d="M66.586 706.4l-4.886 3.383 5.262 7.893 4.886-3.383z" transform="translate(-29.753 -676.332)"/>
              <path id="Path_283" data-name="Path 283" class="cls-3" d="M64.286 702.7l-4.886 2.631 4.886 8.269 4.886-3.007z" transform="translate(-36.098 -686.539)"/>
            </g>
          </g>
          <g id="Group_239" data-name="Group 239" transform="translate(229.64 2663.596)">
            <g id="Group_238" data-name="Group 238">
              <g id="Group_237" data-name="Group 237">
                <path id="Path_284" data-name="Path 284" class="cls-2" d="M61.1 742.9a517.3 517.3 0 0 0 34.577 40.591l40.967-38.712a460.344 460.344 0 0 1-30.819-36.079z" transform="translate(-61.1 -708.7)"/>
              </g>
              <path id="Path_285" data-name="Path 285" class="cls-3" d="M76.934 720.5l-4.134 3.758c1.879 2.255 4.134 4.51 6.389 6.765l4.134-3.759c-2.254-2.254-4.51-4.509-6.389-6.764z" transform="translate(-28.826 -676.151)"/>
              <path id="Path_286" data-name="Path 286" class="cls-3" d="M73.934 717.2l-4.134 3.382 6.013 7.141 4.51-3.758z" transform="translate(-37.102 -685.253)"/>
              <path id="Path_287" data-name="Path 287" class="cls-3" d="M71.134 713.7L67 717.083l5.638 7.517 4.51-3.758z" transform="translate(-44.825 -694.908)"/>
            </g>
          </g>
          <g id="Group_242" data-name="Group 242" transform="translate(264.593 2699.677)">
            <g id="Group_241" data-name="Group 241">
              <g id="Group_240" data-name="Group 240">
                <path id="Path_288" data-name="Path 288" class="cls-2" d="M70.4 757.012l9.02 9.4 9.02 9.4 18.04 17.665 39.463-40.215-17.663-17.673-8.644-8.645-8.269-8.644z" transform="translate(-70.4 -718.3)"/>
              </g>
              <path id="Path_289" data-name="Path 289" class="cls-3" d="M86.234 730.1l-4.134 4.134 6.765 6.389L93 736.865z" transform="translate(-38.126 -685.751)"/>
              <path id="Path_290" data-name="Path 290" class="cls-3" d="M83.034 727l-4.134 3.758 6.765 6.765 4.134-4.134z" transform="translate(-46.953 -694.302)"/>
              <path id="Path_291" data-name="Path 291" class="cls-3" d="M79.934 723.8l-4.134 3.758 6.389 6.765 4.134-3.758z" transform="translate(-55.504 -703.129)"/>
            </g>
          </g>
          <g id="Group_245" data-name="Group 245" transform="translate(300.674 2734.631)">
            <g id="Group_244" data-name="Group 244">
              <g id="Group_243" data-name="Group 243">
                <path id="Path_292" data-name="Path 292" class="cls-2" d="M80 767.815c11.651 11.275 22.926 23.3 34.2 35.329l41.343-38.336q-17.475-19.168-36.08-37.208z" transform="translate(-80 -727.6)"/>
              </g>
              <path id="Path_293" data-name="Path 293" class="cls-3" d="M95.634 739.6l-4.134 4.134 6.389 6.765 4.134-3.758z" transform="translate(-48.278 -694.499)"/>
              <path id="Path_294" data-name="Path 294" class="cls-3" d="M92.258 736.4l-3.758 4.134 6.389 6.389 4.134-3.758z" transform="translate(-56.553 -703.326)"/>
              <path id="Path_295" data-name="Path 295" class="cls-3" d="M89.434 733.3l-4.134 4.134 6.765 6.765 4.134-4.134a57.43 57.43 0 0 0-6.765-6.765z" transform="translate(-65.38 -711.877)"/>
            </g>
          </g>
          <g id="Group_248" data-name="Group 248" transform="translate(334.876 2771.839)">
            <g id="Group_247" data-name="Group 247">
              <g id="Group_246" data-name="Group 246">
                <path id="Path_296" data-name="Path 296" class="cls-2" d="M89.1 775.46c10.9 12.027 21.8 24.054 31.571 36.833l43.974-35.329c-10.9-13.906-22.551-26.685-34.2-39.464z" transform="translate(-89.1 -737.5)"/>
              </g>
              <path id="Path_297" data-name="Path 297" class="cls-3" d="M104.91 749.7l-4.51 3.758c1.879 2.255 4.134 4.886 6.014 7.141l4.51-3.382c-1.88-2.631-4.135-5.262-6.014-7.517z" transform="translate(-57.93 -703.847)"/>
              <path id="Path_298" data-name="Path 298" class="cls-3" d="M101.734 746.3l-4.134 3.758 6.013 6.765 4.134-3.383z" transform="translate(-65.653 -713.226)"/>
              <path id="Path_299" data-name="Path 299" class="cls-3" d="M98.734 742.9l-4.134 4.134 6.389 6.765 4.134-3.758z" transform="translate(-73.929 -722.604)"/>
            </g>
          </g>
          <g id="Group_251" data-name="Group 251" transform="translate(366.447 2811.678)">
            <g id="Group_250" data-name="Group 250">
              <g id="Group_249" data-name="Group 249">
                <path id="Path_300" data-name="Path 300" class="cls-2" d="M97.5 783.053a407.167 407.167 0 0 1 28.188 38.712l46.98-31.195A444.188 444.188 0 0 0 141.1 748.1z" transform="translate(-97.5 -748.1)"/>
              </g>
              <path id="Path_301" data-name="Path 301" class="cls-3" d="M113.11 760.3l-4.51 3.383a91.092 91.092 0 0 1 5.262 7.517l4.51-3.007c-1.503-2.631-3.383-5.262-5.262-7.893z" transform="translate(-66.881 -714.447)"/>
              <path id="Path_302" data-name="Path 302" class="cls-3" d="M110.51 756.7l-4.51 3.383c1.879 2.631 3.758 4.886 5.638 7.517l4.51-3.383c-1.879-2.631-3.759-4.886-5.638-7.517z" transform="translate(-74.053 -724.378)"/>
              <path id="Path_303" data-name="Path 303" class="cls-3" d="M107.71 753.2l-4.51 3.383c1.879 2.255 3.758 4.886 5.638 7.141l4.51-3.383a46.809 46.809 0 0 0-5.638-7.141z" transform="translate(-81.777 -734.032)"/>
            </g>
          </g>
          <g id="Group_254" data-name="Group 254" transform="translate(395.011 2854.149)">
            <g id="Group_253" data-name="Group 253">
              <g id="Group_252" data-name="Group 252">
                <path id="Path_304" data-name="Path 304" class="cls-2" d="M105.1 790.595a401.361 401.361 0 0 1 23.678 40.215L179.517 806a377.309 377.309 0 0 0-27.061-46.6z" transform="translate(-105.1 -759.4)"/>
              </g>
              <path id="Path_305" data-name="Path 305" class="cls-3" d="M120.486 771.8l-4.886 2.631 4.51 8.269 4.89-2.632z" transform="translate(-76.137 -725.196)"/>
              <path id="Path_306" data-name="Path 306" class="cls-3" d="M118.286 767.9l-4.886 3.007 4.51 7.893 4.886-2.631a35.363 35.363 0 0 0-4.51-8.269z" transform="translate(-82.205 -735.953)"/>
              <path id="Path_307" data-name="Path 307" class="cls-3" d="M115.886 764.1L111 767.106a89.917 89.917 0 0 1 4.886 7.894l4.886-3.007a89.925 89.925 0 0 0-4.886-7.893z" transform="translate(-88.825 -746.436)"/>
            </g>
          </g>
          <g id="Group_257" data-name="Group 257" transform="translate(418.313 2900.753)">
            <g id="Group_256" data-name="Group 256">
              <g id="Group_255" data-name="Group 255">
                <path id="Path_308" data-name="Path 308" class="cls-2" d="M111.3 796.605c6.765 13.906 12.4 27.813 15.785 41.719l54.5-14.282a263.572 263.572 0 0 0-19.92-52.242z" transform="translate(-111.3 -771.8)"/>
              </g>
              <path id="Path_309" data-name="Path 309" class="cls-3" d="M126.162 784.1l-5.262 1.879 2.631 8.645 5.638-1.5z" transform="translate(-84.819 -737.871)"/>
              <path id="Path_310" data-name="Path 310" class="cls-3" d="M124.662 779.9l-5.262 2.255c1.128 3.007 2.255 5.638 3.383 8.644l5.262-1.879c-1.128-3.383-2.256-6.014-3.383-9.02z" transform="translate(-88.957 -749.457)"/>
              <path id="Path_311" data-name="Path 311" class="cls-3" d="M122.862 775.8l-5.262 2.255 4.134 8.644 4.886-2.255z" transform="translate(-93.922 -760.766)"/>
            </g>
          </g>
          <g id="Group_260" data-name="Group 260" transform="translate(434.474 2952.995)">
            <g id="Group_259" data-name="Group 259">
              <g id="Group_258" data-name="Group 258">
                <path id="Path_312" data-name="Path 312" class="cls-2" d="M115.6 799.982c3.383 13.906 5.638 27.813 4.51 41.343l56.376 3.007c1.128-20.3-1.5-39.839-6.389-58.631z" transform="translate(-115.6 -785.7)"/>
              </g>
              <path id="Path_313" data-name="Path 313" class="cls-3" d="M129.038 797.4l-5.638.376v9.02h5.638z" transform="translate(-94.084 -753.426)"/>
              <path id="Path_314" data-name="Path 314" class="cls-3" d="M128.538 792.9l-5.638.752 1.128 9.02 5.638-.376c-.001-3.007-.753-6.389-1.128-9.396z" transform="translate(-95.463 -765.839)"/>
              <path id="Path_315" data-name="Path 315" class="cls-3" d="M127.738 788.5l-5.638 1.128a76.959 76.959 0 0 1 1.879 9.02l5.638-1.128c-.752-3.007-1.128-6.013-1.879-9.02z" transform="translate(-97.67 -777.977)"/>
            </g>
          </g>
          <g id="Group_263" data-name="Group 263" transform="translate(429.212 3008.62)">
            <g id="Group_262" data-name="Group 262">
              <g id="Group_261" data-name="Group 261">
                <path id="Path_316" data-name="Path 316" class="cls-2" d="M123.972 800.5a84.756 84.756 0 0 1-3.007 19.544 83.568 83.568 0 0 1-6.765 18.416l50.739 24.43a167.191 167.191 0 0 0 10.524-28.94 141.944 141.944 0 0 0 4.51-30.443z" transform="translate(-114.2 -800.5)"/>
              </g>
              <path id="Path_317" data-name="Path 317" class="cls-3" d="M129.244 812.179l-5.262-1.879c-1.128 2.631-2.255 5.638-3.383 8.269l5.262 2.255c1.128-2.631 1.88-5.638 3.383-8.645z" transform="translate(-96.546 -773.468)"/>
              <path id="Path_318" data-name="Path 318" class="cls-3" d="M129.893 807.228l-5.638-1.128c-.752 3.007-1.5 6.013-2.255 8.644l5.262 1.5a63.223 63.223 0 0 0 2.631-9.016z" transform="translate(-92.684 -785.053)"/>
              <path id="Path_319" data-name="Path 319" class="cls-3" d="M129.765 802.276l-5.638-.376-1.127 9.021 5.638.752c.375-3.384.751-6.391 1.127-9.397z" transform="translate(-89.926 -796.638)"/>
            </g>
          </g>
          <g id="Group_266" data-name="Group 266" transform="translate(405.91 3046.58)">
            <g id="Group_265" data-name="Group 265">
              <g id="Group_264" data-name="Group 264">
                <path id="Path_320" data-name="Path 320" class="cls-2" d="M131.678 810.6a125.938 125.938 0 0 1-10.148 16.913A172.616 172.616 0 0 1 108 842.922l39.463 40.215a183.282 183.282 0 0 0 19.544-22.175 183.754 183.754 0 0 0 15.785-25.933z" transform="translate(-108 -810.6)"/>
              </g>
              <path id="Path_321" data-name="Path 321" class="cls-3" d="M123.348 825.159l-4.134-3.759c-1.879 2.255-4.134 4.51-6.013 6.765l4.134 3.758c1.878-2.255 4.134-4.134 6.013-6.764z" transform="translate(-93.656 -780.809)"/>
              <path id="Path_322" data-name="Path 322" class="cls-3" d="M125.872 821.007l-4.51-3.007a91.179 91.179 0 0 1-5.262 7.517l4.51 3.383c1.503-2.631 3.383-5.262 5.262-7.893z" transform="translate(-85.657 -790.188)"/>
              <path id="Path_323" data-name="Path 323" class="cls-3" d="M127.9 816.931l-4.89-2.631-4.51 7.893 4.886 3.006c1.503-2.63 3.007-5.637 4.514-8.268z" transform="translate(-79.037 -800.394)"/>
            </g>
          </g>
          <g id="Group_269" data-name="Group 269" transform="translate(370.581 3078.902)">
            <g id="Group_268" data-name="Group 268">
              <g id="Group_267" data-name="Group 267">
                <path id="Path_324" data-name="Path 324" class="cls-2" d="M133.553 819.2A175.886 175.886 0 0 1 98.6 845.133l28.564 48.484a232.5 232.5 0 0 0 45.477-34.2z" transform="translate(-98.6 -819.2)"/>
              </g>
              <path id="Path_325" data-name="Path 325" class="cls-3" d="M113.7 834.51l-3.007-4.51a89.941 89.941 0 0 1-7.893 4.886l3.007 4.886c2.631-1.88 5.262-3.383 7.893-5.262z" transform="translate(-87.015 -789.409)"/>
              <path id="Path_326" data-name="Path 326" class="cls-3" d="M117.4 831.91l-3.383-4.51c-2.255 1.879-4.886 3.758-7.517 5.638l3.383 4.51c2.255-1.879 4.885-3.759 7.517-5.638z" transform="translate(-76.808 -796.581)"/>
              <path id="Path_327" data-name="Path 327" class="cls-3" d="M120.524 828.734l-3.758-4.134c-2.255 1.879-4.51 4.134-6.765 6.013l3.758 4.134a54.632 54.632 0 0 1 6.765-6.013z" transform="translate(-67.154 -804.304)"/>
            </g>
          </g>
          <g id="Group_272" data-name="Group 272" transform="translate(329.238 3105.211)">
            <g id="Group_271" data-name="Group 271">
              <g id="Group_270" data-name="Group 270">
                <path id="Path_328" data-name="Path 328" class="cls-2" d="M128.943 826.2A245.8 245.8 0 0 1 87.6 845.744l19.92 52.618a315.459 315.459 0 0 0 49.611-23.678z" transform="translate(-87.6 -826.2)"/>
              </g>
              <path id="Path_329" data-name="Path 329" class="cls-3" d="M101.8 841.462l-2.256-5.262c-3.007 1.127-5.638 2.255-8.644 3.383l1.879 5.262z" transform="translate(-78.497 -798.616)"/>
              <path id="Path_330" data-name="Path 330" class="cls-3" d="M105.9 839.286l-2.631-4.886c-2.631 1.5-5.638 2.631-8.269 4.134l2.255 5.262a95.112 95.112 0 0 1 8.645-4.51z" transform="translate(-67.188 -803.581)"/>
              <path id="Path_331" data-name="Path 331" class="cls-3" d="M109.8 837.186l-2.631-4.886c-2.631 1.5-5.262 3.007-8.269 4.51l2.631 4.886c3.007-1.503 5.638-3.007 8.269-4.51z" transform="translate(-56.43 -809.374)"/>
            </g>
          </g>
        </g>
      </g>
    </g>
    <circle id="Ellipse_1" data-name="Ellipse 1" class="cls-5" cx="15" cy="15" r="15" transform="translate(557 343)"/>
    <circle id="Ellipse_2" data-name="Ellipse 2" class="cls-5" cx="15" cy="15" r="15" transform="translate(945 771)"/>
    <circle id="Ellipse_3" data-name="Ellipse 3" class="cls-5" cx="15" cy="15" r="15" transform="translate(1577 1567)"/>
    <circle id="Ellipse_4" data-name="Ellipse 4" class="cls-5" cx="15" cy="15" r="15" transform="translate(930 2680)"/>
    <circle id="Ellipse_6" data-name="Ellipse 6" class="cls-5" cx="15" cy="15" r="15" transform="translate(815 3523)"/>
  </g>
</svg>
</div>

                      <header class="entry-header">
                        <h1 class="entry-header aboutTitle">About CALS</h1>
                      </header>
                    </div>

                      <div class="intro_and_nav">

                        <div class="aboutMaxWidth">

                            <div class="introLeft">
                                <p>The College of Agricultural and Life Sciences (CALS) is part of the University of Wisconsin­­–Madison, both the flagship and land grant university of Wisconsin. CALS educational and research programs cover fields ranging from physical and life sciences to social science.</p>

                            </div>

                            <div class="introNav">
                                <?php get_template_part('nav_menu', 'sidebar'); ?>
                            </div>

                        </div>

                      </div>


                      <div class="fastfacts">
                        <div class="aboutMaxWidth factsmax">
                            <div class="leftFacts">
                                <h2>Fast Facts</h2>


                                <a href="https://cals.wisc.edu/wp-content/uploads/2019/03/CALS-highlights-fact-sheet2018.pdf" target="_blank"><svg height="16" width="24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" id="Page-1"><g fill="#000" id="Core" transform="translate(-504 -88)"><g id="cloud-download" transform="translate(504 88)"><path d="M19.4 6c-.7-3.4-3.7-6-7.4-6-2.9 0-5.4 1.6-6.6 4C2.3 4.4 0 6.9 0 10c0 3.3 2.7 6 6 6h13c2.8 0 5-2.2 5-5 0-2.6-2.1-4.8-4.6-5zM17 9l-5 5-5-5h3V5h4v4h3z" id="Shape"/></g></g></g></svg> 2018-2019 Fact Sheet</a>
                                <a href="https://cals.wisc.edu/wp-content/uploads/2018/12/CALS-student-snapshot2018.pdf" target="_blank"><svg height="16" width="24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" id="Page-1"><g fill="#000" id="Core" transform="translate(-504 -88)"><g id="cloud-download" transform="translate(504 88)"><path d="M19.4 6c-.7-3.4-3.7-6-7.4-6-2.9 0-5.4 1.6-6.6 4C2.3 4.4 0 6.9 0 10c0 3.3 2.7 6 6 6h13c2.8 0 5-2.2 5-5 0-2.6-2.1-4.8-4.6-5zM17 9l-5 5-5-5h3V5h4v4h3z" id="Shape"/></g></g></g></svg> 2018-2019 Student Snapshot</a>

                                <a href="https://cals.wisc.edu/wp-content/uploads/2017/03/CALS-Brochure.pdf" target="_blank"><svg height="16" width="24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" id="Page-1"><g fill="#000" id="Core" transform="translate(-504 -88)"><g id="cloud-download" transform="translate(504 88)"><path d="M19.4 6c-.7-3.4-3.7-6-7.4-6-2.9 0-5.4 1.6-6.6 4C2.3 4.4 0 6.9 0 10c0 3.3 2.7 6 6 6h13c2.8 0 5-2.2 5-5 0-2.6-2.1-4.8-4.6-5zM17 9l-5 5-5-5h3V5h4v4h3z" id="Shape"/></g></g></g></svg> College Brochure</a>
                            </div>

                            <div class="rightFacts">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 380">
  <path d="M526.62 144.61a1.68 1.68 0 1 0-.62-.12l-4.48-1.07a1.61 1.61 0 0 0 .08-.48 1.67 1.67 0 0 0-3.32-.29l-3.93-.94a1.62 1.62 0 0 0-1.56-.37l-65.39-15.65h-15.74V114l2.68-3.35V108h-3v-3.68h-13.4L415.6 108l-3.35 5 2 2.68h1.34l-.17 10.22-110-.5-5.9-1.51.33-2.34v-2h-5v2.34h1.34v2h-1.34l-6.66 1.8-109.92-.8v-8.71l1.34-1.34 1.67-2.34-3-5.36h-2.34v-2.68h-13.77v2.68h-2.68l1 3 2 3.68v10H148.1l-69.82 18a1.67 1.67 0 0 0-2.36 0 1.81 1.81 0 0 0-.43.73l-3.85 1a1.67 1.67 0 1 0-2.72.7l-1.76.45h-5.48l1.67 4.69h5v117.82h166.18l16.08-9.38H352.1l18.42 9.38H529.3V149.3h4l2.34-4.69h-9z" fill="#f5eed9"/>
  <circle cx="64.02" cy="142.94" r="1.67" fill="#f5eed9"/>
  <circle cx="533.99" cy="142.94" r="1.67" fill="#f5eed9"/>
  <path d="M219.7 83.11v8.29h11v4.3h-11v11.39h-4.84v-28.4h17.32v4.42zM241.79 107.4a8.58 8.58 0 1 1 8.6-8.6 8.34 8.34 0 0 1-8.07 8.6zm0-13.79c-2.64 0-4.3 2-4.3 5.19s1.67 5.23 4.3 5.23 4.26-2 4.26-5.23-1.66-5.19-4.26-5.19zM265.31 107.09v-2.56a9.06 9.06 0 0 1-6 2.87c-3.64 0-5.46-2.29-5.46-5.54V90.55h4.42v10.23c0 2 .93 2.94 2.64 2.94a6 6 0 0 0 4.26-2.17v-11h4.42v16.55zM285.11 107.09V96.87c0-2.09-.78-3-2.52-3a6.39 6.39 0 0 0-4.38 2.32v10.89h-4.41V90.55h4.26v2.75c1.94-2 4-3.06 6.12-3.06 3.64 0 5.35 2.29 5.35 5.54v11.31zM305.69 107.09v-1.55a6.68 6.68 0 0 1-5 1.86c-4.65 0-7.79-3.6-7.79-8.52 0-4.77 3.72-8.64 8-8.64a6.75 6.75 0 0 1 4.57 1.47v-13h4.38v28.4zm-.16-11.43a5 5 0 0 0-3.87-1.94c-2.48 0-4.34 1.86-4.34 5.08 0 3 1.59 5.08 4.42 5.08a4.62 4.62 0 0 0 3.8-1.86zM329.21 100.16h-11.47c.35 2.32 1.74 3.8 5.15 3.8a17.47 17.47 0 0 0 4.8-.89l.54 3.41a23.57 23.57 0 0 1-5.77.93c-6.2 0-9.07-3.84-9.07-8.52 0-4.46 3-8.64 8.37-8.64 5 0 7.56 3.53 7.56 7.94a11.78 11.78 0 0 1-.11 1.97zm-3.8-2.75c-.19-2.25-1.51-3.72-3.72-3.72s-3.56 1.36-3.87 3.72zM344.71 107.09v-1.55a6.68 6.68 0 0 1-5 1.86c-4.65 0-7.79-3.6-7.79-8.52 0-4.77 3.72-8.64 8-8.64a6.75 6.75 0 0 1 4.57 1.47v-13h4.38v28.4zm-.16-11.43a5 5 0 0 0-3.87-1.94c-2.48 0-4.34 1.86-4.34 5.08 0 3 1.59 5.08 4.42 5.08a4.62 4.62 0 0 0 3.8-1.86zM364 87.41a2.6 2.6 0 1 1 2.43-2.41 2.6 2.6 0 0 1-2.43 2.41zm-2.21 19.68V90.55h4.42v16.55zM382.06 107.09V96.87c0-2.09-.78-3-2.52-3a6.39 6.39 0 0 0-4.38 2.32v10.89h-4.42V90.55H375v2.75c1.94-2 4-3.06 6.12-3.06 3.64 0 5.35 2.29 5.35 5.54v11.31zM258.57 324.83v-27.62l-6.13 2.37-2.18-5.83 13.35-5.1h1.82v36.18zM287 325.44c-7.41 0-12.14-4.67-12.14-10.14a9 9 0 0 1 5.77-8.56c-3.46-1.82-5-4.43-5-8 0-5.52 4.55-10 11.41-10s11.35 4.43 11.35 10c0 3.52-1.58 6.13-5 8a9 9 0 0 1 5.77 8.56c-.04 5.46-4.77 10.14-12.16 10.14zm0-16.09a4.92 4.92 0 0 0-5.22 4.6 5.23 5.23 0 1 0 10.44.56 4.91 4.91 0 0 0-4.66-5.16 5.23 5.23 0 0 0-.56 0zm0-14.81a4.82 4.82 0 0 0-5 4.63v.37a5 5 0 0 0 10 0 4.81 4.81 0 0 0-4.61-5 2.54 2.54 0 0 0-.39 0zM317 325.44c-7.41 0-12.14-4.67-12.14-10.14a9 9 0 0 1 5.77-8.56c-3.46-1.82-5-4.43-5-8 0-5.52 4.55-10 11.41-10s11.35 4.43 11.35 10c0 3.52-1.58 6.13-5 8a9 9 0 0 1 5.77 8.56c.01 5.46-4.72 10.14-12.16 10.14zm0-16.09a4.92 4.92 0 0 0-5.22 4.6 5.23 5.23 0 1 0 10.44.56 4.91 4.91 0 0 0-4.66-5.16 5.23 5.23 0 0 0-.56 0zm0-14.81a4.82 4.82 0 0 0-5 4.63v.37a5 5 0 0 0 10 0 4.81 4.81 0 0 0-4.61-5 2.54 2.54 0 0 0-.39 0zM340.46 326.47l-2.85-5.16c6.5-3.28 11.23-6.86 14.08-10.87a9.42 9.42 0 0 1-5.28 1.52c-6.8 0-10.93-4.92-10.93-11a12 12 0 0 1 11.85-12.15h.59c7.77 0 12.5 5.46 12.5 13 .02 8.45-5.2 17.37-19.96 24.66zm7.41-32.23c-3.7 0-5.71 2.91-5.71 6.31 0 3.82 2.06 6.43 5.58 6.43 3.82 0 5.89-2.37 5.89-6.37 0-3.71-2.3-6.38-5.76-6.38z" fill="#4d4d4d"/>
  <path fill="#969696" d="M258.67 188.28h91.71v71.04h-91.71z"/>
  <path fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M74.79 158.46v111.55h166.15l16.08-9.38h101.49l18.43 9.38h158.78v2.01-113.56H74.79z"/>
  <path fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M74.79 152.1H226.2v6.36H74.79zM226.2 152.1h158.11v6.36H226.2zM384.31 152.1h151.41v6.36H384.31zM220.5 147.41l2.35 4.69h165.48l2.68-4.69H220.5z"/>
  <path fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M74.79 152.1h-5.02l-1.68-4.69H220.5l2.35 4.69H74.79zM388.33 152.1h151.41l2.34-4.69H391.01l-2.68 4.69z"/>
  <path fill="#f5eed9" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M88.86 160.47h8.37v12.73h-8.37zM88.19 185.38h8.37v17.98h-8.37zM109.06 185.38h8.37v17.98h-8.37zM128.92 186.39h8.37v17.98h-8.37zM148.78 186.39h8.37v17.98h-8.37zM169.99 186.39h8.37v17.98h-8.37zM187.83 186.39h8.37v17.98h-8.37zM209.71 186.39h8.37v17.98h-8.37zM241.36 185.38h8.37v17.98h-8.37zM359.52 186.39h8.37v17.98h-8.37zM392.17 186.39h8.37v17.98h-8.37zM412.03 186.39h8.37v17.98h-8.37zM432.23 187.4h8.37v17.98h-8.37zM452.43 187.4h8.37v17.98h-8.37zM471.96 187.4h8.37v17.98h-8.37zM492.15 187.4h8.37v17.98h-8.37zM512.35 187.4h8.37v17.98h-8.37zM512.35 218.04h8.37v20.67h-8.37zM493.5 218.04h8.37v20.67h-8.37zM472.29 217.7h8.37v20.67h-8.37zM452.43 218.04h8.37v20.67h-8.37zM432.23 217.7h8.37v20.67h-8.37zM412.03 217.7h8.37v20.67h-8.37zM392.17 217.7h8.37v20.67h-8.37zM359.52 217.7h8.37v20.67h-8.37zM241.36 215.68h8.37v20.67h-8.37zM208.03 217.7h8.37v20.67h-8.37zM188.84 217.7h8.37v20.67h-8.37zM168.31 217.7h8.37v20.67h-8.37zM148.78 217.7h8.37v20.67h-8.37zM128.92 217.7h8.37v20.67h-8.37zM109.06 217.7h8.37v20.67h-8.37zM88.19 217.7h8.37v20.67h-8.37zM108.96 160.47h8.37v12.73h-8.37zM129.06 160.47h8.37v12.73h-8.37zM149.16 160.47h8.37v12.73h-8.37zM169.93 160.47h8.37v12.73h-8.37zM190.03 160.47h8.37v12.73h-8.37zM209.79 160.47h8.37v12.73h-8.37zM243.29 160.47h8.37v12.73h-8.37zM359.52 160.47h8.37v12.73h-8.37zM392.02 161.47h8.37v12.73h-8.37zM412.11 161.47h8.37v12.73h-8.37zM432.21 162.14h8.37v12.73h-8.37zM452.31 162.48h8.37v12.73h-8.37zM472.08 162.48h8.37v12.73h-8.37zM492.17 162.14h8.37v12.73h-8.37zM512.27 162.14h8.37v12.73h-8.37z"/>
  <path fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M87.94 249.31h8.37v12.73h-8.37zM108.04 249.31h8.37v12.73h-8.37zM128.14 249.31h8.37v12.73h-8.37zM148.24 249.31h8.37v12.73h-8.37zM169.01 249.32h8.37v12.73h-8.37zM189.11 249.32h8.37v12.73h-8.37zM208.87 249.32h8.37v12.73h-8.37zM242.37 249.32h8.37v12.73h-8.37zM358.61 249.32h8.37v12.73h-8.37zM391.1 250.32h8.37v12.73h-8.37zM411.2 250.32h8.37v12.73h-8.37zM431.3 250.99h8.37v12.73h-8.37zM451.4 251.33h8.37v12.73h-8.37zM471.16 251.33h8.37v12.73h-8.37zM491.26 250.99h8.37v12.73h-8.37zM511.36 250.99h8.37v12.73h-8.37z"/>
  <path fill="#f5eed9" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M273.77 160.48h8.37v9.71h-8.37zM301.24 160.48h8.37v9.71h-8.37zM328.37 160.48h8.37v9.71h-8.37z"/>
  <path fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M254.67 170.19h102.84l-1.68 4.68h-99.15l-2.01-4.68zM261.04 174.87h90.44v8.37h-90.44zM261.04 183.25h90.44v5.69h-90.44zM224.52 147.41l76.71-20.77h1.34v-2.01h-1.34v-2.35h5.03v2.01l-.34 2.35 80.96 20.77H224.52zM165.9 109.89l1.01 3.01 2.01 3.69v15.07h13.4l2.34-4.02v-8.71l1.34-1.34 1.68-2.34-3.02-5.36h-2.34v-2.68h-13.74v2.68h-2.68z"/>
  <path fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M73.56 147.41l80.95-20.77h14.41v5.02h13.4l2.34-4.02 109.92.8 7.99-1.8v-2.01h-1.34v-2.35h5.03v2.01l-.34 2.35 5.9 1.51 110 .5.17-10.22h-1.34l-2.01-2.68 3.35-5.02 2.35-3.69h13.4v3.69h3.01v2.68l-2.68 3.35v11.72h15.74l79.11 18.93M74.79 175.88H226.2v3.01H74.79zM226.2 175.21h34.84v3.01H226.2zM351.48 175.21h32.16v3.01h-32.16zM384.31 175.88h151.41v3.01H384.31zM384.31 240.53h151.41v3.01H384.31zM74.79 240.53H226.2v3.01H74.79zM226.2 238.85h34.17v3.01H226.2zM350.81 239.52h33.5v3.01h-33.5zM227.2 158.46h3.01v16.75h-3.01zM227.2 178.22h3.01v60.63h-3.01zM380.62 158.46h3.01v16.75h-3.01zM380.62 178.22h3.01v61.3h-3.01zM298.22 241.87h13.73v17.75h-13.73zM305.09 241.87v17.75M264.22 255.94c2.68 0 4.86.3 4.86.67s-2.18.67-4.86.67-4.86-.3-4.86-.67 2.18-.67 4.86-.67zM291.69 255.94c2.68 0 4.86.3 4.86.67s-2.18.67-4.86.67-4.86-.3-4.86-.67 2.17-.67 4.86-.67zM319.49 255.94c2.68 0 4.86.3 4.86.67s-2.18.67-4.86.67-4.86-.3-4.86-.67 2.18-.67 4.86-.67zM347.63 255.94c2.68 0 4.86.3 4.86.67s-2.18.67-4.86.67-4.86-.3-4.86-.67 2.23-.67 4.86-.67z"/>
  <path d="M296.88 147.07a3.88 3.88 0 0 0 3-3.68s-1.34-1 0-1.34v-1.34a5.13 5.13 0 0 0 4-3s1.34-2.68 3 0c0 0-.67 2 2.68 2.68h1v1.34s1.34 1 0 1.67a3.69 3.69 0 0 0 3.35 3.68c3.4.33-17.03-.01-17.03-.01zM240.94 270.01h136" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="76.47" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="83.5" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="90.53" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="97.9" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="104.6" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="111.64" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="119.01" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="125.71" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="132.41" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="139.44" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="146.14" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="152.84" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="160.21" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="166.91" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="174.28" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="180.98" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="187.68" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="194.71" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="201.41" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="208.11" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="215.48" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="222.18" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="229.55" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="236.25" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="242.95" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="249.98" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="256.68" cy="145.4" r="1.67" transform="rotate(-80.78 256.692 145.402)" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="263.38" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="278.12" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="284.82" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="291.85" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="270.75" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="70.44" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="456.66" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="463.7" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="470.73" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="478.1" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="484.8" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="491.83" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="499.2" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="505.9" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <path d="M512.6 144.06a1.67 1.67 0 1 1-1.67 1.67 1.67 1.67 0 0 1 1.67-1.67z" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="519.64" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="526.34" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="533.04" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="540.41" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="450.63" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="360.19" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="367.22" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="374.26" cy="145.06" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="381.63" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="388.33" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="395.36" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="402.73" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="409.43" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="416.13" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="423.16" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="429.86" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="436.56" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="443.93" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="352.48" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="325.69" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="332.05" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="339.09" cy="145.4" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="346.45" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="318.99" cy="145.73" r="1.67" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <path fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M272.43 194.27h9.76v11.11h-9.76zM299.36 194.61h9.76v11.11h-9.76zM326.63 194.61h9.76v11.11h-9.76z"/>
  <circle cx="277.14" cy="215.48" r="3.37" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <circle cx="331.34" cy="215.48" r="3.37" fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <path d="M261.38 190.85l.25.09h-.1a16.45 16.45 0 0 0 3.9.32 3 3 0 0 0 2.16-.74 1.74 1.74 0 0 0-1 2.08 2.15 2.15 0 0 0 1.91 1.46 1.77 1.77 0 0 0 1.16-.3 2.08 2.08 0 0 0 .71-1.51 3 3 0 0 0-.42-2 3.34 3.34 0 0 0-2.82-1.22c-1.07 0-2.11.29-3.18.37-.88.07-1.76 0-2.63.08a3.89 3.89 0 0 0-2.4 1 2 2 0 0 0-.45 2.4 3.38 3.38 0 0 0 3.65 1 1.58 1.58 0 0 0 0-2.75 7.44 7.44 0 0 1-.74-.28zM289.18 190.85l.25.09h-.1a16.45 16.45 0 0 0 3.9.32 3 3 0 0 0 2.16-.74 1.74 1.74 0 0 0-1 2.08 2.15 2.15 0 0 0 1.91 1.46 1.77 1.77 0 0 0 1.16-.3 2.08 2.08 0 0 0 .71-1.51 3 3 0 0 0-.42-2 3.34 3.34 0 0 0-2.82-1.22c-1.07 0-2.11.29-3.18.37-.88.07-1.76 0-2.63.08a3.89 3.89 0 0 0-2.4 1 2 2 0 0 0-.45 2.4 3.38 3.38 0 0 0 3.65 1 1.58 1.58 0 0 0 0-2.75c.08.05-.81-.3-.74-.28zM316.65 190.85l.25.09h-.1a16.45 16.45 0 0 0 3.9.32 3 3 0 0 0 2.16-.74 1.74 1.74 0 0 0-1 2.08 2.15 2.15 0 0 0 1.91 1.46 1.77 1.77 0 0 0 1.16-.3 2.08 2.08 0 0 0 .71-1.51 3 3 0 0 0-.42-2 3.34 3.34 0 0 0-2.82-1.25c-1.07 0-2.11.29-3.18.37-.88.07-1.76 0-2.63.08a3.89 3.89 0 0 0-2.4 1 2 2 0 0 0-.45 2.4 3.38 3.38 0 0 0 3.65 1 1.58 1.58 0 0 0 0-2.75 7.44 7.44 0 0 1-.74-.25zM344.45 191.19l.25.09h-.1a16.45 16.45 0 0 0 3.9.32 3 3 0 0 0 2.16-.74 1.74 1.74 0 0 0-1 2.08 2.15 2.15 0 0 0 1.91 1.46 1.77 1.77 0 0 0 1.16-.3 2.08 2.08 0 0 0 .71-1.51 3 3 0 0 0-.42-2 3.34 3.34 0 0 0-2.82-1.22c-1.07 0-2.11.29-3.18.37-.88.07-1.76 0-2.63.08a3.89 3.89 0 0 0-2.4 1 2 2 0 0 0-.45 2.4 3.38 3.38 0 0 0 3.65 1 1.58 1.58 0 0 0 0-2.75 7.44 7.44 0 0 1-.74-.28z" fill="#f5eed9" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <path d="M261 194.3s4.69-1 6.7 0v61.64a23.36 23.36 0 0 0-7.37 0zM288.84 194.3s4.69-1 6.7 0v61.64a23.36 23.36 0 0 0-7.37 0zM316.31 194.3s4.69-1 6.7 0v61.64a23.36 23.36 0 0 0-7.37 0zM344.45 194.64s4.69-1 6.7 0v61.64a23.36 23.36 0 0 0-7.37 0z" fill="#f5eed9" stroke="#c90000" stroke-linejoin="round" stroke-width="2"/>
  <path fill="none" stroke="#c90000" stroke-linejoin="round" stroke-width="2" d="M259.03 257.28h9.71v2.34h-9.71zM286.83 257.28h9.71v2.34h-9.71zM314.63 257.28h9.71v2.34h-9.71zM342.44 257.28h9.71v2.34h-9.71z"/>
</svg>
                            </div>

                        </div>

                        <div class="crest"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 598.44 940.352">
  <defs>
    <radialGradient id="radial-gradient" cx="296.307" cy="468.043" r="248.978" gradientTransform="translate(-170.791 -269.877) scale(1.577)" gradientUnits="userSpaceOnUse">
      <stop offset=".17" stop-color="#fff"/>
      <stop offset=".3" stop-color="#f6ede4"/>
      <stop offset=".69" stop-color="#debe9b"/>
      <stop offset=".87" stop-color="#d4ac7f"/>
    </radialGradient>
  </defs>
  <g id="uw-crest-web" transform="translate(.039 -.007)" opacity=".068">
    <path id="Path_6" data-name="Path 6" d="M296.694 935.034a40.729 40.729 0 0 1-11.314-12.5l-.646-.97h-1.185C88.2 875.772-20.624 575.586 3.942 335.416a514.057 514.057 0 0 1 13.9-78.118 381.321 381.321 0 0 1 25.105-68.851 253.746 253.746 0 0 1 40.406-60.878 158.39 158.39 0 0 1 116.368-55.382 3.556 3.556 0 0 0 3.556-3.017 59.154 59.154 0 0 1 41.806-28.014h2.047v-2.048A50.534 50.534 0 0 1 296.694.642a51.288 51.288 0 0 1 49.133 38.143v2.047h2.047a59.369 59.369 0 0 1 42.238 28.338 3.448 3.448 0 0 0 3.987 2.8 158.39 158.39 0 0 1 116.045 55.275 258.594 258.594 0 0 1 45.685 72.3l2.478 5.926a458.578 458.578 0 0 1 31.139 129.3c24.567 240.817-84.259 541-279.5 586.473h-1.185l-.646.97a40.728 40.728 0 0 1-11.421 12.822z" transform="translate(2.688 2.308)" fill="url(#radial-gradient)"/>
    <path id="Path_7" data-name="Path 7" d="M595.185 337.76a533.256 533.256 0 0 0-9.266-59.261 428.95 428.95 0 0 0-14.977-53.12 337.146 337.146 0 0 0-24.028-53.12 243.83 243.83 0 0 0-32.324-44.177 160.975 160.975 0 0 0-117.985-56.244h-.647a62.171 62.171 0 0 0-44.823-31.355 53.12 53.12 0 0 0-103.007 0 62.171 62.171 0 0 0-44.823 31.355h-.646A160.976 160.976 0 0 0 84.136 128.19a243.835 243.835 0 0 0-32.324 44.177 337.145 337.145 0 0 0-24.028 53.12 428.938 428.938 0 0 0-14.977 53.12 533.244 533.244 0 0 0-9.267 59.261C-20.7 581.486 88.877 881.026 285.948 926.927a34.156 34.156 0 0 0 13.684 13.792 34.156 34.156 0 0 0 13.684-13.792c197.071-45.901 306.651-345.441 281.869-589.167zM299.632 9.667a42.022 42.022 0 0 1 42.345 29.846 52.366 52.366 0 0 0-41.591 26.614 1.831 1.831 0 0 1-.754.97 1.616 1.616 0 0 1-.754-.97 52.366 52.366 0 0 0-41.591-26.614 42.022 42.022 0 0 1 42.345-29.846zm-20.041 46.224a37.82 37.82 0 0 1 17.132 22.735 4.956 4.956 0 0 0 2.909 3.987 4.956 4.956 0 0 0 2.909-4.525 37.82 37.82 0 0 1 17.132-22.735 45.146 45.146 0 0 1 64.649 17.024 144.162 144.162 0 0 0-17.994 4.523 71.114 71.114 0 0 0-25.644 14.223 101.283 101.283 0 0 0-32.324 65.726c-7.219 78.764 83.182 66.373 87.707 66.05 11.637 0 20.472-18.425 20.472-43.1s-9.051-43.1-20.472-43.1c-7 0-19.071 5.6-20.257 27.476-.754 16.485 6.788 36.958 16.485 38.143 5.064.646 9.59-8.189 10.775-17.24s.646-20.149-6.357-21.55a4.094 4.094 0 0 0-4.956 3.017 41.268 41.268 0 0 1 4.849 14.115c0 13.469-13.792 6.788-12.068-14.654 1.293-18.748 10.883-17.778 11.314-17.778 5.387 0 13.576 10.775 13.576 32.324 0 18.856-9.051 39.113-26.506 28.553-14.654-10.775-20.364-35.341-16.378-53.874 1.832-8.728 9.374-32.324 33.725-32.324 35.126 0 67.881 18.425 93.956 52.8-2.909 9.159-21.011 44.177-78.441 77.686l-3.125 1.616a118.522 118.522 0 0 0-53.12-10.775 291.676 291.676 0 0 0-50 7.973 44.068 44.068 0 0 1-9.913 1.616 44.069 44.069 0 0 1-9.913-1.616 291.678 291.678 0 0 0-50-7.973A118.523 118.523 0 0 0 186.6 255.01l-3.125-1.616c-57.537-33.51-75.424-68.528-78.441-77.686 26.075-34.372 58.83-52.8 93.956-52.8 24.351 0 32.324 23.812 33.725 32.324 4.094 19.071-1.724 43.638-16.378 53.874-17.347 10.775-26.506-9.7-26.506-28.553 0-21.55 8.189-32.324 13.576-32.324 0 0 10.128-1.185 11.745 17.778 1.832 21.55-11.745 28.122-12.068 14.654a41.267 41.267 0 0 1 4.2-14.438 4.094 4.094 0 0 0-4.633-3.017c-7 1.724-7.65 14.007-6.357 21.55s6.034 17.886 10.775 17.24c9.7-1.293 17.24-21.55 16.378-37.065-1.077-21.55-13.253-27.476-20.257-27.476-11.421 0-20.472 18.425-20.472 43.1s8.835 43.1 20.472 43.1c4.525 0 94.926 12.714 87.707-66.05a101.283 101.283 0 0 0-32.317-65.726 71.114 71.114 0 0 0-25.644-14.223 144.166 144.166 0 0 0-18.425-4.741 45.146 45.146 0 0 1 65.08-17.024zM108.7 386.247a350.076 350.076 0 0 0-3.017 35.665 478.618 478.618 0 0 0 21.55 164.316 533.138 533.138 0 0 0 44.5 100.421 123.7 123.7 0 0 1-55.275 25.105A718.248 718.248 0 0 1 46.747 368.9a173.8 173.8 0 0 0 61.953 17.347zm-61.63-23.489c4.741-78.764 24.674-140.611 53.874-181.771 5.172 13.361 27.691 46.87 79.626 77.363-44.177 26.614-64.649 81.458-70.9 122.4a170.347 170.347 0 0 1-62.6-17.994zm127.682 328.955c33.186 57.107 65.942 91.155 91.047 109.149a124.341 124.341 0 0 1-38.143 46.763c-43.1-29.092-79.734-75.424-108.5-130.7a127.251 127.251 0 0 0 55.596-25.212zm96.111 112.812a131.454 131.454 0 0 0 28.769 15.731 131.447 131.447 0 0 0 28.768-15.731 129.3 129.3 0 0 0 38.035 46.763 201.387 201.387 0 0 1-38.574 19.179v-1.4c-2.8-14.223-21.55-17.132-28.122-17.132s-25.321 2.909-28.122 17.132v1.4a201.387 201.387 0 0 1-38.574-19.179 129.3 129.3 0 0 0 37.82-46.763zm62.6-3.448c25.105-17.994 57.861-52.042 91.047-109.149a127.251 127.251 0 0 0 55.6 25.429c-28.769 54.844-65.3 101.391-108.5 130.267a124.341 124.341 0 0 1-38.143-46.763zm93.956-114.321a533.132 533.132 0 0 0 44.608-100.637 475.171 475.171 0 0 0 17.886-78.872 477.753 477.753 0 0 0 3.663-85.336 350.091 350.091 0 0 0-3.448-35.665 173.8 173.8 0 0 0 61.958-17.346A718.249 718.249 0 0 1 482.8 711.754a123.694 123.694 0 0 1-55.383-25.213zm62.278-306c-6.68-40.944-26.937-94.818-70.9-122.4 51.935-30.493 74.562-64 79.626-77.363 28.984 41.16 49.025 103.007 53.874 181.771a170.349 170.349 0 0 1-62.6 17.778zM267.308 909.687a250.946 250.946 0 0 1-63.248-31.57 296.31 296.31 0 0 1-35.018-28.23 335.09 335.09 0 0 1-25.321-26.614q-8.189-9.482-15.731-19.5a511.694 511.694 0 0 1-60.124-104.41 688.52 688.52 0 0 1-36.634-110.334 759.191 759.191 0 0 1-19.287-116.476 695.717 695.717 0 0 1-.754-116.8 608.2 608.2 0 0 1 8.3-62.063 423.663 423.663 0 0 1 15.081-60.23A334.017 334.017 0 0 1 57.2 181.094a225.517 225.517 0 0 1 33.941-47.84 174.444 174.444 0 0 1 43.1-33.4 150.094 150.094 0 0 1 20.8-9.374q5.5-1.939 10.775-3.448a95.039 95.039 0 0 1 10.775-2.8 150.847 150.847 0 0 1 27.584-2.263 81.673 81.673 0 0 1 41.806 10.775 86.2 86.2 0 0 1 35.988 64.649c4.2 48.7-45.362 56.352-55.059 56.244-1.508 0-2.263-1.4 2.586-6.357a70.36 70.36 0 0 0 10.775-54.952c-4.741-22.3-20.472-39.759-43.1-39.759a120.247 120.247 0 0 0-87.491 41.914 245.45 245.45 0 0 0-47.086 85.552 459.978 459.978 0 0 0-24.143 122.723 672.669 672.669 0 0 0 2.586 114.537A740.343 740.343 0 0 0 61.94 591.4a655.333 655.333 0 0 0 38.035 106.131 467.2 467.2 0 0 0 59.046 96.969 278.959 278.959 0 0 0 87.6 74.67 195.576 195.576 0 0 0 23.812 10.775 72.3 72.3 0 0 0 7.65 32.324 71.448 71.448 0 0 1-10.775-2.586zm35.449 16.7a6.464 6.464 0 0 1-3.34 2.263 6.464 6.464 0 0 1-3.34-2.263 69.928 69.928 0 0 1-16.27-55.706c1.293-6.9 12.93-10.021 19.61-10.128s18.317 3.232 19.61 10.128a69.929 69.929 0 0 1-16.055 55.6zm284.562-453.834a759.18 759.18 0 0 1-19.287 116.476 688.509 688.509 0 0 1-36.85 109.9 511.693 511.693 0 0 1-60.123 104.411q-7.542 10.021-15.731 19.5a335.079 335.079 0 0 1-25.321 26.614 296.325 296.325 0 0 1-35.018 28.23 250.945 250.945 0 0 1-63.033 32 71.44 71.44 0 0 1-10.775 2.586 72.3 72.3 0 0 0 7.219-33.4 195.558 195.558 0 0 0 23.813-10.77 278.96 278.96 0 0 0 87.6-74.023 467.2 467.2 0 0 0 59.045-96.977 655.337 655.337 0 0 0 38.035-106.132 740.334 740.334 0 0 0 21.334-113.674 672.657 672.657 0 0 0 2.586-114.536 459.974 459.974 0 0 0-24.136-122.725 245.451 245.451 0 0 0-48.163-84.8 120.247 120.247 0 0 0-87.491-41.914c-22.843 0-38.574 17.455-43.1 39.759a70.36 70.36 0 0 0 10.777 54.953c4.849 4.956 4.094 6.357 2.586 6.357-9.7 0-59.369-7.65-55.059-56.244A86.2 86.2 0 0 1 352.213 93.5a81.673 81.673 0 0 1 41.806-10.78 150.846 150.846 0 0 1 27.581 2.263 94.489 94.489 0 0 1 10.775 2.8q5.6 1.508 10.775 3.448a150.1 150.1 0 0 1 20.8 9.374 174.445 174.445 0 0 1 43.1 33.4 225.518 225.518 0 0 1 33.941 47.84 334.019 334.019 0 0 1 23.7 51.611 423.663 423.663 0 0 1 15.085 60.231c3.771 20.58 6.249 41.375 7.973 62.171a695.734 695.734 0 0 1-.431 116.691z" transform="translate(-.25 -.36)" fill="#282728"/>
    <path id="Path_8" data-name="Path 8" d="M377.679 192.613c-1.185-28.984-9.7-117.445-69.821-155.8A101.39 101.39 0 0 0 261.1 24.2c-29.523-1.939-51.4 9.374-66.157 9.805h-.431c-14.762 0-36.85-11.745-66.373-9.805a100.745 100.745 0 0 0-47.091 13.04C20.494 75.168 12.09 163.629 11.335 192.613a468.919 468.919 0 0 0 38.143 204.721c41.16 91.478 91.155 156.343 141.042 178.431l3.987 1.724 3.987-1.724c49.672-21.55 99.882-86.845 141.581-178.539a469.028 469.028 0 0 0 37.604-204.613z" transform="translate(104.875 230.447)" fill="#c5050c"/>
    <path id="Path_9" data-name="Path 9" d="M253.008 60.452v19.61h5.926a12.607 12.607 0 0 1 8.835 3.017 13.684 13.684 0 0 1 2.263 11.96s-40.3 174.444-47.948 207.631c-8.835-42.022-56.675-271.31-56.675-271.31v-.97h-9.7v1.077l-41.7 267.539L66.6 94.823a29.1 29.1 0 0 1 0-3.017 13.684 13.684 0 0 1 3.34-10.775 10.775 10.775 0 0 1 7.438-1.831h3.987V59.805H14.13v18.964h3.017a12.5 12.5 0 0 1 10.236 8.943L109.7 440.8v.97h11.852v-1.078l38.358-251.053L208.723 440.8v.97H219.5l78.117-353.2a10.775 10.775 0 0 1 10.775-8.081h4.633V60.452z" transform="translate(135.805 293.111)" fill="#fff"/>
  </g>
</svg></div>
                      </div>


                      <div class="academics">
                        <div class="aboutMaxWidth2">

                            <h2 class="academicsTitle">Academics</h2>

                            <div class="academics_cols">
                                <div class="academics_col1">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 380">
  <path d="M212.52 304.66c-4.7 0-7.47-2.64-7.47-7.52v-11.6h3.21v11.37c0 3.23 1.59 4.83 4.31 4.83s4.31-1.62 4.31-4.83v-11.37h3.21v11.6c0 4.8-2.95 7.52-7.57 7.52zM239 304.71l-11.78-12.42v12.06H224v-19.07l.51-.1 11.63 12.24v-11.88h3.21v19.1zM248.82 304.5a51.67 51.67 0 0 1-5.42-.31v-18.47a43.56 43.56 0 0 1 5.23-.31c7.44 0 11.11 4.29 11.11 9.37.02 5.28-3.47 9.72-10.92 9.72zm.21-16.27a16.17 16.17 0 0 0-2.41.15v13.12a15.24 15.24 0 0 0 2.7.15c4.83 0 7-2.9 7-6.88s-2.52-6.54-7.32-6.54zM263.22 304.35v-18.81h11.47v2.93h-8.26v4.93h7.47v2.82h-7.47v5.21h8.26v2.93zM288.67 304.35l-4.11-6.78h-1c-.62 0-1.26 0-1.87-.05v6.8h-3.21v-18.6a39.83 39.83 0 0 1 5-.31c5.34 0 7.7 2.59 7.7 5.93a5.8 5.8 0 0 1-3.67 5.44l4.93 7.57zm-4.83-16.07a11.16 11.16 0 0 0-2.16.15v6.42a14.24 14.24 0 0 0 1.85.1c2.8 0 4.21-1.31 4.21-3.46 0-1.9-1.43-3.21-3.89-3.21zM310.79 294.39v8.21a12.18 12.18 0 0 1-7 2 9.72 9.72 0 1 1-.62-19.43h.62a12 12 0 0 1 6.67 2l-1.46 2.58a9.49 9.49 0 0 0-5.06-1.57c-4.29 0-6.7 3-6.7 6.78a6.62 6.62 0 0 0 6.37 6.85h.3a7.1 7.1 0 0 0 3.8-.9v-3.7h-4.39v-2.82zM324.55 304.35l-4.11-6.78h-1c-.62 0-1.26 0-1.87-.05v6.8h-3.21v-18.6a39.83 39.83 0 0 1 5-.31c5.34 0 7.7 2.59 7.7 5.93a5.8 5.8 0 0 1-3.67 5.44l4.93 7.57zm-4.83-16.07a11.16 11.16 0 0 0-2.16.15v6.42a14.24 14.24 0 0 0 1.85.1c2.8 0 4.21-1.31 4.21-3.46 0-1.9-1.43-3.21-3.9-3.21zM342.84 304.35L341 300h-7.44l-1.82 4.31h-3.31l8.68-19.07h.46l8.65 19.07zm-5.54-13.14l-2.67 6.29H340zM353.62 304.5a51.67 51.67 0 0 1-5.42-.31v-18.47a43.56 43.56 0 0 1 5.23-.31c7.44 0 11.11 4.29 11.11 9.37.01 5.28-3.48 9.72-10.92 9.72zm.21-16.27a16.17 16.17 0 0 0-2.41.15v13.12a15.24 15.24 0 0 0 2.7.15c4.83 0 7-2.9 7-6.88s-2.52-6.54-7.3-6.54zM375 304.66c-4.7 0-7.47-2.64-7.47-7.52v-11.6h3.21v11.37c0 3.23 1.59 4.83 4.31 4.83s4.31-1.62 4.31-4.83v-11.37h3.21v11.6c.02 4.8-2.93 7.52-7.57 7.52zM398.34 304.35l-1.82-4.35h-7.44l-1.82 4.31H384l8.67-19.07h.46l8.65 19.07zm-5.54-13.14l-2.67 6.29h5.34zM409.94 288.46v15.89h-3.21v-15.89h-6v-2.93h15.17v2.93zM418.59 304.35v-18.81h11.47v2.93h-8.26v4.93h7.47v2.82h-7.47v5.21h8.26v2.93zM228.78 335.45a11.08 11.08 0 0 1-5.9-1.85l1.1-2.87a8.72 8.72 0 0 0 4.9 1.75c2 0 2.85-1.15 2.85-2.46s-.57-2.13-3.54-3.39c-3.29-1.39-4.47-3.08-4.47-5.34 0-2.72 2.26-5.26 6.19-5.26a8.87 8.87 0 0 1 4.72 1.36l-1 2.82a7.22 7.22 0 0 0-3.77-1.33c-2 0-2.9 1.08-2.9 2.34s.92 2 3.26 3c3.72 1.62 4.8 3.13 4.8 5.59-.02 3.05-2.36 5.64-6.24 5.64zM247.31 335.45c-6 0-10.14-4.11-10.14-9.7s4.23-9.75 10.14-9.75a11.79 11.79 0 0 1 6.06 1.72l-1.11 2.72a10.61 10.61 0 0 0-5-1.44c-4.13 0-6.65 2.75-6.65 6.72a6.33 6.33 0 0 0 5.93 6.7 5.34 5.34 0 0 0 .8 0 10.68 10.68 0 0 0 5.13-1.49l1 2.72a11.77 11.77 0 0 1-6.16 1.8zM268.12 335.14v-8.08h-8.65v8.08h-3.21v-18.81h3.21v7.85h8.65v-7.85h3.21v18.81zM284.21 335.45c-5.44 0-9.42-4.13-9.42-9.7a9.44 9.44 0 0 1 9.14-9.73h.46c5.44 0 9.42 4.13 9.42 9.73a9.43 9.43 0 0 1-9.15 9.7zm.1-16.55c-3.59 0-6.08 2.93-6.08 6.85s2.49 6.85 6.08 6.85 6.06-3 6.06-6.85-2.49-6.85-6.06-6.85zM297.27 335.14v-18.81h3.21v15.89h8.26v2.93zM323.52 335.14l-1.82-4.31h-7.44l-1.82 4.31h-3.31l8.68-19.07h.46l8.65 19.07zM318 322l-2.67 6.29h5.34zM339.1 335.14l-4.1-6.77h-1c-.62 0-1.26 0-1.87-.05v6.8h-3.21v-18.61a39.83 39.83 0 0 1 5-.31c5.34 0 7.7 2.59 7.7 5.93a5.8 5.8 0 0 1-3.67 5.44l4.93 7.57zm-4.83-16.07a11.16 11.16 0 0 0-2.16.15v6.42a14.24 14.24 0 0 0 1.85.1c2.8 0 4.21-1.31 4.21-3.46 0-1.89-1.43-3.2-3.9-3.2zM349.62 335.45a11.08 11.08 0 0 1-5.9-1.85l1.1-2.87a8.72 8.72 0 0 0 4.9 1.75c2 0 2.85-1.15 2.85-2.46s-.56-2.13-3.54-3.39c-3.29-1.39-4.47-3.08-4.47-5.34 0-2.72 2.26-5.26 6.18-5.26a8.87 8.87 0 0 1 4.72 1.36l-1 2.82a7.22 7.22 0 0 0-3.77-1.33c-2 0-2.9 1.08-2.9 2.34s.92 2 3.26 3c3.72 1.62 4.8 3.13 4.8 5.59-.02 3.05-2.36 5.64-6.23 5.64zM370.76 335.14v-8.08h-8.65v8.08h-3.21v-18.81h3.21v7.85h8.65v-7.85H374v18.81zM378.2 335.14v-18.81h3.21v18.81zM390.72 329.09c-.62 0-1.26 0-1.87-.08v6.13h-3.21v-18.63a40.07 40.07 0 0 1 4.77-.31c5.16 0 7.8 2.82 7.8 6.34.01 3.83-2.69 6.55-7.49 6.55zm.23-9.93a14.83 14.83 0 0 0-2.1.15v6.88c.64.05 1.23.1 1.8.1 2.9 0 4.23-1.51 4.23-3.64 0-1.85-1.31-3.5-3.88-3.5zM405.5 335.45a11.08 11.08 0 0 1-5.9-1.85l1.1-2.87a8.72 8.72 0 0 0 4.9 1.75c2 0 2.85-1.15 2.85-2.46s-.56-2.13-3.54-3.39c-3.29-1.39-4.47-3.08-4.47-5.34 0-2.72 2.26-5.26 6.19-5.26a8.87 8.87 0 0 1 4.72 1.36l-1 2.82a7.22 7.22 0 0 0-3.77-1.33c-2 0-2.9 1.08-2.9 2.34s.92 2 3.26 3c3.72 1.62 4.8 3.13 4.8 5.59-.03 3.05-2.36 5.64-6.24 5.64zM267.1 365.93l-1.82-4.31h-7.44l-1.84 4.31h-3.3l8.68-19.07h.46l8.65 19.07zm-5.55-13.14l-2.67 6.29h5.34zM288.42 366.24l-.51.05-5.85-13.09-5.77 13.09-.49-.05-6-19.12h3.54l3.35 11.88 5.24-12h.36l5.26 11.93 3.34-11.78h3.49zM307.79 365.93l-1.79-4.31h-7.44l-1.82 4.31h-3.31l8.68-19.07h.46l8.65 19.07zm-5.54-13.14l-2.67 6.29h5.34zM323.37 365.93l-4.11-6.78h-2.87v6.8h-3.21V347.3a39.83 39.83 0 0 1 5-.31c5.34 0 7.7 2.59 7.7 5.93a5.8 5.8 0 0 1-3.67 5.44l4.93 7.57zm-4.83-16.07a11.16 11.16 0 0 0-2.16.15v6.42a14.24 14.24 0 0 0 1.85.1c2.8 0 4.21-1.31 4.21-3.46 0-1.89-1.44-3.2-3.9-3.2zM334.81 366.09a51.67 51.67 0 0 1-5.42-.31V347.3a43.73 43.73 0 0 1 5.24-.31c7.44 0 11.11 4.29 11.11 9.37 0 5.29-3.49 9.73-10.93 9.73zm.21-16.27a16.17 16.17 0 0 0-2.41.15v13.12a15.24 15.24 0 0 0 2.7.15c4.82 0 7-2.9 7-6.88s-2.52-6.54-7.31-6.54zM349.2 365.93v-18.81h11.47V350h-8.26v5h7.47v2.82h-7.47V363h8.26v2.93zM369.86 366.09a51.67 51.67 0 0 1-5.42-.31V347.3a43.73 43.73 0 0 1 5.24-.31c7.44 0 11.11 4.29 11.11 9.37 0 5.29-3.49 9.73-10.93 9.73zm.21-16.27a16.17 16.17 0 0 0-2.41.15v13.12a15.24 15.24 0 0 0 2.7.15c4.83 0 7-2.9 7-6.88s-2.52-6.54-7.29-6.54z" fill="#fff"/>
  <path d="M243.88 140.36l-85.9 127s0 3.63 2.42 3.63c22.43-1.6 41.69-2.63 56.93-3.33 47.95-2.19 38.29-.19 51.16-1.6 10.25-1.12 16.59-2.42 25.58 0 7.59 2 11.19 5.14 19.18 4.8 5.14-.22 5.56-1.59 14.39-3.2a126.77 126.77 0 0 1 17.59-1.6c12.15-.49 21.42 0 22.38 0 11.95.57 40.55 1 98.88 1.3.19-.37.39-.83.6-1.36a7.48 7.48 0 0 0 .6-2.27c0-1.21-83.48-123.4-83.48-123.4L317.68 144z" fill="#c90000"/>
  <path d="M176.13 261.34s90.74-24.2 134.29-2.42a22.57 22.57 0 0 0 9.68 0s64.12-26.62 127-3.63V248l-62.88-101.59-66.54 2.42-71.38-2.42-70.17 106.46z" fill="#fff" stroke="#4d4d4d" stroke-linejoin="round"/>
  <path d="M176.13 252.87s122-32.9 137.8 6.54c0 0-36.17-7.75-64-5.33l-73.8 7.26z" fill="#ebdcb2" stroke="#4d4d4d" stroke-linejoin="round"/>
  <path d="M447.23 248.16s-119.87-28.71-133.91 11.24c1.56-.06 3.92-.19 6.79-.48a115.78 115.78 0 0 0 23-4.84c6.73-2 17.07-3.73 32.34-2.19l72.09 4.73z" fill="#ebdcb2" stroke="#4d4d4d" stroke-linejoin="round"/>
  <path fill="none" stroke="#666" stroke-miterlimit="10" d="M315.26 148.75l-2.42 110.17"/>
  <path d="M157.38 266.89s135.89-6.39 143.89-4.8c0 0 9.59 8 25.58 0l140.69 1.6v3.2l-139.89.8-14.8 2.24-13.61-2.6-138.65 4.36z" fill="#920530"/>
  <path d="M243.88 140.36l-85.9 127s0 3.63 2.42 3.63c94.62-5.15 134.72-5.66 140.06-3.33a26 26 0 0 0 4.8 1.6 33.17 33.17 0 0 0 14.13-.17 38.39 38.39 0 0 0 5.06-1.43c5.57-2 46.4-2.46 142-.3.19-.37.39-.83.6-1.36a7.48 7.48 0 0 0 .6-2.27c0-1.21-83.48-123.4-83.48-123.4L317.68 144z" fill="none" stroke="#4d4d4d" stroke-linejoin="round" stroke-width="2"/>
  <path d="M397.76 212.15a96.47 96.47 0 0 1-9.22-19.08c-1.15-3.21-2.07-8.11-.54-15.07a142.71 142.71 0 0 0-6-14c-3.11-6.3-4.75-8.42-6-13a37.94 37.94 0 0 1-1-13c.24-6.54-1.65-16.41-11.72-30.45 2.34-2.34-3.51-10.52-3.51-10.52l-25.7-25.7-2.52.16a6.66 6.66 0 0 1-.48-2.86 11.45 11.45 0 0 1 2-5.08 98.52 98.52 0 0 1 23-26c-.73-4.47-9.19-3.8-9.91-8.27-.23-1.46.56-2.88.75-4.35.55-4.34-4.57-7.65-8.89-7s-7.8 3.77-11 6.77c-6.89-1.3-13.89-2.61-20.87-1.91s-14 3.69-18.07 9.43c-1.34 1.91-2.57 4.28-4.84 4.84a14.64 14.64 0 0 1-3.5 0 8.85 8.85 0 0 0-8.55 8.71c-2-2.18-6.84-3.47-6.86-.49 0 1.77 23.29 13.83 26.27 16.33 4.94 4.14 6 7.8 4.7 12.24l-2.63.17-29.87 26.58A57.15 57.15 0 0 0 253 114a65.41 65.41 0 0 0-4 19c-.27 4.58.93 7.42 1.51 18.38.36 6.77.19 8.55-.51 10.62-1.74 5.14-4.7 6-7 11s-1.77 9.28-1.69 12.56c.14 6.41-1.28 15.84-8.33 28.92-2.34 4.67 5.84 5.84 5.84 5.84 2.42-.37 6.07-.85 10.52-1.17a138.46 138.46 0 0 1 36.23 2.34c11.09 2 28 3.06 52.59-1.17 18.82-3.73 30.87-4 38.57-3.51 2.15.14 16.34 1.17 16.36 1.17 3.5 2.35 8.17.02 4.67-5.83z" fill="#ebdcb2"/>
  <path d="M397.76 212.15a96.47 96.47 0 0 1-9.22-19.08c-1.15-3.21-2.07-8.11-.54-15.07a142.71 142.71 0 0 0-6-14c-3.11-6.3-4.75-8.42-6-13a37.94 37.94 0 0 1-1-13c.24-6.54-1.65-16.41-11.72-30.45 2.34-2.34-3.51-10.52-3.51-10.52l-25.7-25.7-2.52.16a6.66 6.66 0 0 1-.48-2.86 11.45 11.45 0 0 1 2-5.08 98.52 98.52 0 0 1 23-26c-.73-4.47-9.19-3.8-9.91-8.27-.23-1.46.56-2.88.75-4.35.55-4.34-4.57-7.65-8.89-7s-7.8 3.77-11 6.77c-6.89-1.3-13.89-2.61-20.87-1.91s-14 3.69-18.07 9.43c-1.34 1.91-2.57 4.28-4.84 4.84a14.64 14.64 0 0 1-3.5 0 8.85 8.85 0 0 0-8.55 8.71c-2-2.18-6.84-3.47-6.86-.49 0 1.77 23.29 13.83 26.27 16.33 4.94 4.14 6 7.8 4.7 12.24l-2.63.17-29.87 26.58A57.15 57.15 0 0 0 253 114a65.41 65.41 0 0 0-4 19c-.27 4.58.93 7.42 1.51 18.38.36 6.77.19 8.55-.51 10.62-1.74 5.14-4.7 6-7 11s-1.77 9.28-1.69 12.56c.14 6.41-1.28 15.84-8.33 28.92-2.34 4.67 5.84 5.84 5.84 5.84 2.42-.37 6.07-.85 10.52-1.17a138.46 138.46 0 0 1 36.23 2.34c11.09 2 28 3.06 52.59-1.17 18.82-3.73 30.87-4 38.57-3.51 2.15.14 16.34 1.17 16.36 1.17 3.5 2.35 8.17.02 4.67-5.83z" fill="none" stroke="#4d4d4d" stroke-miterlimit="10" stroke-width="2"/>
  <path d="M293.47 59.38a5.51 5.51 0 0 0 2.16 1.9 1.81 1.81 0 0 0 2.37-1c.23-1-.65-1.77-1.42-2.38a62.89 62.89 0 0 1-13.94-15.43c-.9-1.42-2-3-3.66-3.22-8.85-1.06-.32 6.79 1.5 8.08a64.22 64.22 0 0 1 12.99 12.05z" fill="#b0a586"/>
  <path d="M301.39 56.37c1.17-2.66.42-5.76-.34-8.58l-4.53-16.72c-.65-2.39-1.41-4.12-3.6-5.07-4.34 5.73-8.48 7.32-5.2 14.34 1.13 2.44 14.49 14.18 13.67 16.03z" style="isolation:isolate" fill="#b0a586" opacity=".6"/>
  <path d="M309.66 54.47a7.78 7.78 0 0 0 1.11 4.18c.88 1.19 2.78 1.83 4 .93l1.06-36.71a79.25 79.25 0 0 0-9.5.21c4.77 7.18 2.74 22.83 3.33 31.39z" fill="#b0a586"/>
  <path d="M328.34 26.66c.63-2.21 1.91-4.21 3.6-4.67s3.14.51 4.59 1.42a3 3 0 0 1 1.57 1.84 4.87 4.87 0 0 1-.22 2.27c-1.28 4.77-5.23 27.13-9 25.29-4.08-2-1.69-22.07-.54-26.15z" style="isolation:isolate" fill="#b0a586" opacity=".68"/>
  <path d="M344.1 30.65l-8.21 21.68a35.31 35.31 0 0 1 10.5-9.23 17.08 17.08 0 0 0 4.07-2.76 4.38 4.38 0 0 0 1.15-4.52 31.55 31.55 0 0 1-8.18-4.21" style="isolation:isolate" fill="#b0a586" opacity=".74"/>
  <path d="M336.18 90.62a33 33 0 0 0 4.08 6.24 42.22 42.22 0 0 0 5.33 4.38c6 4.66 10.48 10.89 14.9 17C355 105 347 92.36 338.47 80.84c-1.79-2.43-8.13-11.33-10.71-4.09-1.05 2.96 6.82 11.08 8.42 13.87z" style="isolation:isolate" fill="#b0a586" opacity=".67"/>
  <path d="M310.87 108c1.79 1.28 4.23-.59 4.86-3s0-4.92-.41-7.35A79.73 79.73 0 0 1 314 78.83c.41-8.58-6-12.41-6.82-3-.88 9.75 1.52 22.66 3.69 32.17z" style="isolation:isolate" fill="#b0a586" opacity=".5"/>
  <path d="M273.24 118c1.18 1 4.49-.87 6.12-2.1 4.13-3.13 4.35-7.3 6.64-12.88 3.1-7.54 5.67-7.16 10-15a53.34 53.34 0 0 0 6-18.08 215 215 0 0 0-13.33 17.59c-2.13 3.09-18.82 27.53-15.43 30.47z" style="isolation:isolate" fill="#b0a586" opacity=".51"/>
  <path d="M327.86 62c1.8.06 4 .33 4.56 1.47.4.84-.43 1.76-1.56 2.21a12.49 12.49 0 0 1-3.83.63c-4.41.26-36 2.19-34.46-1.62 1.78-4.56 29.93-2.9 35.29-2.69zM338.69 70.88c-.61 2.2-4.3 2.84-7.27 3-12.91.82-25.92 1.63-38.77.43-2.21-.21-5.13-1.64-3.77-3a3.56 3.56 0 0 1 1.85-.7c14.42-2.43 33.47-1.94 47.96.27z" fill="#4d4d4d"/>
  <path d="M342.49 91.21c.92.37 3.92 1.57 8 3 2.45.84 4.44 1.46 5.59 1.82 3.13-3.67 3.34-5.12 2.91-5.75s-1-.43-2.65-.8A27.4 27.4 0 0 1 352 88c-3.92-1.38-59.44-18.5-60-16.89-.44 1.32 36.43 14.49 50.49 20.1z" fill="#4d4d4d"/>
  <path d="M247.68 191.13L259.16 216c-4.33-1.85-7.39-5.94-9-10.34s-2.11-9.16-2.54-13.85" fill="#b0a586"/>
  <path d="M334.92 215.11c2.13-2.32 3-5.49 3.82-8.54l2.94-11c.59-2.2 1.08-4.82-.43-6.52s-4.55-1.44-6.36.06-2.71 3.8-3.48 6c-2.18 6.21-10.86 35.66 3.51 20z" style="isolation:isolate" fill="#b0a586" opacity=".48"/>
  <path d="M272.44 137.35l-.33 3.34a16.17 16.17 0 0 1 5.44 1.85l-1.55 5.11a14.78 14.78 0 0 0-4.37-1.89l-.49 4.94c5.11 1.77 6.92 3.71 6.92 7.33 0 4.37-3.34 7.46-8.49 7.7l-.29 3.17h-3l.29-3.34a17.3 17.3 0 0 1-6.84-2.51l1.85-5.15a15.88 15.88 0 0 0 5.48 2.51l.54-5.31c-5-1.73-6.67-3.75-6.67-7.13 0-4 3.13-7.13 8.2-7.41l.33-3.21zm-4.2 12.32l.37-4.16c-1.52.12-2.18.86-2.18 1.89s.44 1.65 1.8 2.27zm2.18 6.47l-.41 4.49c1.61-.16 2.39-.91 2.39-2.06s-.46-1.73-2-2.43zM287.72 165.28v-17.5l-4.16 1.73-1.94-5.11 10.26-4h1.94v24.84zM304.44 159.1a3.25 3.25 0 1 1-3.21 3.29 3.24 3.24 0 0 1 3.21-3.25zM322.15 150.82c5.4.41 7.29 3.21 7.29 6.59 0 4.12-3.83 8.28-9.85 8.28a21.06 21.06 0 0 1-7-1.11l1.28-5a14.6 14.6 0 0 0 5.15.91c2.31 0 4.16-1 4.16-2.8 0-1.48-1.36-2.72-4.24-2.72a13.07 13.07 0 0 0-3.3.33l-1.11-2.84 6.88-6.3h-8.16V141H329v4zM356 165.28l-.32-12.67-7.14 9h-.63l-7.21-9-.25 12.67h-5.77l1.2-26 .81-.07L348.35 154l11.4-14.74.81.07 1.23 26z" fill="#4d4d4d"/>
  <path d="M245 197s3 16 8 19c0 0-12 2-16 0s9-14 8-19z" style="isolation:isolate" opacity=".12"/>
</svg>
                                </div>

                                <div class="academics_col2"><img src="<?php echo get_template_directory_uri(); ?>/images/infographics/dept-majors-programs-18-19.svg" />
                                </div>

                                <div class="academics_col2">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/infographics/enrollment-18-19.svg" />
                                </div>

                                <div class="academics_col2">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/infographics/alumni-18-19.svg" />
                                </div>
                            </div>
                        </div>
                      </div>


                      <div class="research_outreach">
                        <div class="aboutMaxWidth">

                            <div class="researchCol">
                                <h2>Research</h2>

                                <div class="col_inner">

                                    <div class="rs_svgs"><img src="<?php echo get_template_directory_uri(); ?>/images/infographics/research-funding-18-19.svg" />

                                    </div>

                                    <div class="rs_svgs">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 380">
  <g id="_Group_" data-name="Group" fill="#c9c9c9">
    <path d="M484.27 150.34v3.87c-.21.3-.36.76-.65.87-3.43 1.39-2.66 4.63-3.11 7.24a9.47 9.47 0 0 1-3.24 5.62c-1.78 1.72-4.1 3.82-3.29 7.28.55 2.38-1.61 4.18-3 5.78-3 3.53-5.26 7.26-6.06 11.85a11.75 11.75 0 0 1-2.73 5.37c-2.87 3.43-3.74 7.5-4.31 11.73a28.16 28.16 0 0 1-1.81 8c-.85 1.88-.23 3.59.69 5.26 2.13 3.86 1.49 7.71-2.27 9.67-4.32 2.25-5.5 6.21-6.51 10.26-.56 2.3-1.8 4.42-1.74 6.91a21.29 21.29 0 0 0 1.12 6.43 11.85 11.85 0 0 1-1.28 10.83c-2.13 3-3.79 6-3.27 9.89a5.63 5.63 0 0 1-1.12 3.65c-2.4 3.82-3.19 8.17-4.17 12.45-.1.45-.33 1-.14 1.35 1.9 3.16.32 6.83 1.55 10.07a1.55 1.55 0 0 1 .09 1.08c-1.49 2.67-.15 4.74 1.14 7a7.41 7.41 0 0 1 .8 5.62 3.25 3.25 0 0 0 1.07 3.25c3.09 3.06 2.87 6.93 1.68 10.31-1.44 4.08-1.32 8.1-1.3 12.21 0 1.2.14 2.4-.73 3.4h-29.25a6.82 6.82 0 0 0-3.26-.36c-19.24-.08-38.49.12-57.73-.29-17-.37-34.06-.17-51.08-.45-2.3 0-3.64-.54-4.19-3.2-1.34-6.42-2.54-7.29-9.15-8.29l-3.54-.56c-6.28-1-9.69-4.89-9.9-11.27 0-1 .18-2.13-.6-2.9-3-2.9-2.69-6.75-3-10.35a25.16 25.16 0 0 0-.78-5.1c-1-3.4.29-6.33 2.36-9 3.14-4 2.45-6.44-2.32-7.92-.9-.28-2.07-.55-2-1.59.22-3.15-1-6.06-1.22-9.19a91 91 0 0 0-1.53-12.74 6.11 6.11 0 0 1-.31-2.44c1.29-5.22-1.48-9.27-3.89-13.33s-5.29-7-10.29-7.74c-1.68-.25-3.25-1.66-4.72-2.76-6-4.47-11.46-9.25-14.2-16.7-1.91-5.2-7.08-7.28-12-8.91-3.54-1.18-6.33-3-7.87-6.33a4.93 4.93 0 0 0-4.7-3.17 16.21 16.21 0 0 1-11.93-6 55.73 55.73 0 0 0-6.73-6.12c-1.84-1.52-2.58-3-1-5.16a4.1 4.1 0 0 0 1-2.52c-.08-5.39 1.76-10.9-1.18-16.11a2.38 2.38 0 0 1 1-3.17c1.59-1.12 1.64-2.62 1.21-4.18-.83-3-.19-6-.28-9.07a2.77 2.77 0 0 1 1-2.23c2.21-1.71 2.19-4.59 3.6-6.73.61-.94-3.66-9.56-4.77-9.87a6.93 6.93 0 0 0-1.64-.11c-4-.12-5.22-1.3-5.27-5.35s.36-7.69 4-10.26c1.79-1.24 2.56-3.17 3-5.38a10.32 10.32 0 0 1 5.58-7.45c2.18-1.12 4.18-2.82 6.2-3.76 2.79-1.31 4.76-4.29 8.29-4.22 1.47 0 3.63-3.81 3.63-5.88V53.51c0-2.34-.09-4.59 3.27-4.43.88 0 1.19-.75 1.41-1.48a5.59 5.59 0 0 1 1.1-2.18c3.91-4.4 4-4.49 8.69-.91 4.3 3.26 9 2.46 13.31.88 5.84-2.16 12-3.23 17.65-6a33.39 33.39 0 0 0 8.47-5.52c1.33-1.25 2.59-2.14 4.58-.76s3.61-.61 5-1.71c2-1.68 3.66-3.93 6.81-3.11a1.46 1.46 0 0 0 1-.35c1.19-.89 2.23-1.73 4-1a8.54 8.54 0 0 1 5 5.08 3 3 0 0 1-.33 2.39 34.55 34.55 0 0 1-3.71 7.07 4.35 4.35 0 0 0-.85 4.38 3.74 3.74 0 0 1-1.19 4.25c-.58.54-1.4 1-1.32 2.2 2.11-.46 4.33.08 5-3.2.64-3 2.55-3.28 4.67-.77a21.11 21.11 0 0 0 12.11 6.89c4.22.85 7.63 2.9 11.32 4.64a4.85 4.85 0 0 1 2.33 2.61c1.2 2.69 2.56 5.33 3.53 8.1a4.71 4.71 0 0 0 3.68 3.21c14.22 3.8 28.39 7.81 42.67 11.42 5.82 1.46 10.41 5 15.44 7.79 1.78 1 3.44 2 5.61 1.92 2.36-.06 4.77 0 6.82 1.53a1.2 1.2 0 0 0 1.31 0c3.28-1.75 6.29-.12 9.46.57 4.25.92 8.17 2.94 12.56 3.43 3.19.36 6.34 4 6.71 7.15a3.3 3.3 0 0 1-.87 2.54c-1.75 2.13 0 2.57 1.46 2.75a18.72 18.72 0 0 1 11.87 5.74c1.23 1.3 2.28 2.72 1.49 4.7-.32.79.15 1.4.45 2.07s.82 1.6.57 2c-1.48 2.75-.54 5.75-1.11 8.57a4.18 4.18 0 0 1-1.77 2.72c-1.68 1.13-.86 3.07-1.76 4.6 2.35.45 4.43.54 6.33-.93 1.17-.91 2.49-1.53 3.63-.08s2.25 2.89.9 4.71a18.66 18.66 0 0 0-2.25 4.4c-2 5-1 7.52 3.88 10 1.46.74 2.18 1.8 1.26 3.32a8.77 8.77 0 0 0-1.12 4.45c-.13 3.32-2 5-7.16 5.91-2.33.43-4.27.66-3.47 3.77a1.3 1.3 0 0 1-.29 1c-3.05 3.15-4.3 7.39-6.48 11.06a24.42 24.42 0 0 0-2.76 9.59c-.09.81.39 1.19 1.08 1.35a1.41 1.41 0 0 0 1.81-.84c1.3-3.26 4-4.9 7-6.25a5.1 5.1 0 0 0 2.7-3.61 23.92 23.92 0 0 1 4.87-9.12c2-2.32 4.92-2.23 7.42-3.22 2.08-.83 3.66-1.89 4.38-4.15a22 22 0 0 1 5.07-9.05c1.79-1.84 1.22-4.74 2.51-6.92.64-1.08 1.25-1.77 2.5-1.74 2.08.06 3.17-1.15 3.82-2.92a17.92 17.92 0 0 1 1.59-3.48c2.01-2.95 5.9-3.19 8.39-.2zm-4.1 3.43a.89.89 0 0 0 .47-1.17.75.75 0 0 0-.15-.24 1 1 0 0 0-1.36-.39 1 1 0 0 0-.29.24 7.89 7.89 0 0 0-2 3.86 6 6 0 0 1-4.28 4.25c-2.25.48-2.76 1.76-3 3.61-.22 1.65-.44 3.58-1.81 4.48a10.82 10.82 0 0 0-4.39 7.08 8.75 8.75 0 0 1-5.33 6.2c-1.74.74-3 3-4.8 2.49-2.27-.62-3.12.57-3.92 2a27.07 27.07 0 0 0-2.85 6.24 7.26 7.26 0 0 1-4.4 5.28 9.37 9.37 0 0 0-5.28 4.61c-1.29 2.74-3 3.4-5.81 2.4s-3.39-2.51-2.56-5.64a13.06 13.06 0 0 1 .46-2.15c1.18-2.56.78-5.65 2.7-8 2.53-3 3.24-7.14 5.94-10.08.25-.27.2-.9.13-1.34-.5-3 1.35-4.16 3.81-4.75a23.71 23.71 0 0 0 5.28-1.55c2.12-1.08 2.75-6.35.93-7.84-4.53-3.74-5.38-6.87-3.26-12.42.71-1.86 1.56-3.67 2.74-6.43-2.71 2.19-5.28 2.18-7.77 2.49a3 3 0 0 1-3.6-2.25 3.06 3.06 0 0 1 0-1.13c.19-1.44 0-3.42.71-4.23 2.54-3 3.12-6.07 2.85-9.94-.1-1.36.91-3-.15-4.59a2.34 2.34 0 0 1-.2-1.85c.59-1.56-.29-2.32-1.3-3.25a16.05 16.05 0 0 0-4.71-2.59c-2.37-1.06-5-1.13-7.24-2.34s-2.79-2.68-1.54-5c1.59-2.93.65-5.43-2.63-6.18-5.91-1.35-11.62-3.8-17.55-4.48-3.4-.39-6.85-.13-10.41-.88-3-.64-6-1-8.78-2.54-4.54-2.56-8.6-6-13.83-7.34-14-3.67-27.86-7.67-41.87-11.21-4.28-1.08-7.46-2.6-8.39-7.29-.28-1.41-1.19-2.69-1.7-4.07a7.77 7.77 0 0 0-3.78-4.06c-2.57-1.53-5.5-1.62-8.14-2.91-4.16-2-8.62-3.44-12.35-6.26-.85-.64-1.44-.73-2.13 0-2.33 2.29-5.78 2.25-8.37 4.06a2.39 2.39 0 0 1-3-.61 2.2 2.2 0 0 1-.38-3c1.06-1.39 1.45-3.22 2.87-4.32a2.46 2.46 0 0 0 .87-3.15c-.91-2.49.17-4.51 1.74-6.27a12.09 12.09 0 0 0 2.59-4.82c.59-2-.48-4.14-2.28-3.85-2.8.46-6.12-.08-8.32 2.6s-4.91 4.5-8.41 4.21-5.79 1.75-8.31 3.49c-.67.46-1.23 1.22-2 1.45-6.1 1.88-12.2 3.76-18.28 5.7s-12.44 3.33-17.7-2.32c-.38-.4-1.06-.83-1.41-.2-.7 1.27-2.45 1.7-2.51 3.47a2.68 2.68 0 0 1-2 2.71c-2.71.38-2.45 2.19-2.45 4.06v34.26a6.26 6.26 0 0 1-1.75 4.7c-1.71 1.84-2.72 4.42-5.94 3.92-.19 0-.43.31-.66.46-3.07 2-6 4.35-9.4 5.74a9.41 9.41 0 0 0-6.21 7.13c-.52 2.49-1.49 4.84-3.66 6.29-2.74 1.84-3.17 4.49-3.25 7.45 0 2.07.59 3.17 2.83 3a4.89 4.89 0 0 1 3.42.82c.84.6 6 9.94 5.84 10.93a22.85 22.85 0 0 1-3.29 8.29 8.13 8.13 0 0 0-1.65 4.72 30.22 30.22 0 0 0 .41 6.58c.46 2 .38 4.08-1.52 5.53a1.19 1.19 0 0 0-.35 1.65c2.45 5.38 1.86 11.21.45 16.39-1.18 4.32.38 6.11 3.09 8.23a12 12 0 0 1 2.46 2.2c3 4.21 7.27 6 12.31 6.26a5.48 5.48 0 0 1 5 3.7c1.34 3.12 3.81 4.58 6.94 5.75 5.41 2 11.23 4.24 13.33 10.22 2.51 7.18 7.93 11.51 13.53 15.84a8.35 8.35 0 0 0 3.56 2c4.9.65 8.31 3.54 10.74 7.37 3.09 4.89 7 9.64 5.66 16.18-.21 1 .29 2.18.34 3.28.23 4.81 1.67 9.44 1.65 14.34 0 2.06-.13 5 2.55 6.45 5.8 3.23 6.42 7.18 2.07 12.33a6.78 6.78 0 0 0-1.38 7.42 11.29 11.29 0 0 1 .55 4c.09 2.71-.21 5.65 1.53 8a10.77 10.77 0 0 1 2.14 6.39c.18 4.63 2.38 7 7 7.82q3 .54 6 1c4.13.75 7.56 2.2 8.42 7 .55 3.1 2.49 4.13 5.86 4.13 20.16 0 40.32.36 60.48.53 24.12.2 48.24.33 72.36.55 2.06 0 2.77-.62 2.72-2.68a25.93 25.93 0 0 1 1.45-10.55c1.12-2.82 1.16-5.93-1.38-8.46a5.53 5.53 0 0 1-1.41-5 6 6 0 0 0-2-6 3.15 3.15 0 0 1-.78-4.42 3.3 3.3 0 0 0 .5-2.59c-.88-3.38.12-7-1.36-10.36-.25-.56.21-1.42.33-2.14a38.53 38.53 0 0 1 4.53-13.21 4.14 4.14 0 0 0 .61-2.66c-.55-3.95 1.06-7.12 3.35-10.17s2.3-6.4 1-9.7a14 14 0 0 1-.59-8.93 91.7 91.7 0 0 1 3-10 12.49 12.49 0 0 1 6-7.1c2.68-1.44 2.95-3.39 1.47-6.22-1.17-2.24-2.1-4.59-1-7.11a23.87 23.87 0 0 0 1.71-7.21c.48-4.05 1-8.32 3.49-11.51 4.84-6.24 4.78-15 10.9-20.46.12-.1.07-.39.18-.51 1.59-2 1-4.55 2-6.74 1.61-3.63 5.74-6.24 4.55-11a.33.33 0 0 1 .08-.25c2.19-1.45 1.24-5 4.1-6z"/>
    <path d="M480.49 152.36a.89.89 0 0 1-.08 1.26 1 1 0 0 1-.24.15c-2.86 1-1.91 4.49-4.08 5.87a.33.33 0 0 0-.08.25c1.19 4.78-2.94 7.4-4.55 11-1 2.19-.4 4.77-2 6.74-.11.13-.06.41-.18.51-6.12 5.47-6.06 14.22-10.9 20.46-2.48 3.19-3 7.46-3.49 11.51a23.87 23.87 0 0 1-1.71 7.21c-1.14 2.53-.21 4.87 1 7.11 1.48 2.83 1.21 4.79-1.47 6.22a12.49 12.49 0 0 0-6 7.1c-1.27 3.29-2 6.68-3 10a14 14 0 0 0 .59 8.93c1.27 3.29 1.21 6.74-1 9.7s-3.9 6.22-3.35 10.17a4.14 4.14 0 0 1-.61 2.66 38.53 38.53 0 0 0-4.53 13.21c-.12.72-.57 1.59-.33 2.14 1.48 3.34.48 7 1.36 10.36a3.3 3.3 0 0 1-.5 2.59 3.16 3.16 0 0 0 .78 4.42 6 6 0 0 1 2 6 5.54 5.54 0 0 0 1.36 5.11c2.54 2.53 2.49 5.64 1.38 8.46a25.93 25.93 0 0 0-1.45 10.55c.06 2.06-.66 2.7-2.72 2.68-24.12-.23-48.24-.35-72.36-.55-20.16-.17-40.32-.52-60.48-.53-3.37 0-5.31-1-5.86-4.13-.86-4.82-4.29-6.27-8.42-7q-3-.54-6-1c-4.6-.83-6.8-3.19-7-7.82a10.77 10.77 0 0 0-2.14-6.39c-1.74-2.33-1.44-5.27-1.53-8a11.29 11.29 0 0 0-.55-4 6.78 6.78 0 0 1 1.38-7.42c4.35-5.14 3.73-9.1-2.07-12.33-2.69-1.5-2.56-4.39-2.55-6.45 0-4.89-1.42-9.53-1.65-14.34 0-1.1-.55-2.25-.34-3.28 1.32-6.53-2.57-11.29-5.66-16.18-2.43-3.84-5.84-6.73-10.74-7.37a8.35 8.35 0 0 1-3.56-2c-5.6-4.33-11-8.65-13.53-15.84-2.09-6-7.92-8.18-13.33-10.22-3.12-1.18-5.59-2.64-6.94-5.75a5.48 5.48 0 0 0-5-3.7c-5-.23-9.26-2-12.31-6.26a12 12 0 0 0-2.46-2.2c-2.72-2.12-4.27-3.91-3.09-8.23 1.41-5.18 2-11-.45-16.39a1.19 1.19 0 0 1 .3-1.66c1.9-1.45 2-3.54 1.52-5.53a30.22 30.22 0 0 1-.41-6.58 8.13 8.13 0 0 1 1.65-4.72 22.85 22.85 0 0 0 3.29-8.29c.17-1-5-10.33-5.84-10.93a4.89 4.89 0 0 0-3.42-.82c-2.24.2-2.88-.89-2.83-3 .08-3 .51-5.61 3.25-7.45 2.17-1.46 3.14-3.8 3.66-6.29a9.41 9.41 0 0 1 6.21-7.13c3.43-1.39 6.33-3.72 9.4-5.74.23-.15.47-.49.66-.46 3.22.5 4.23-2.08 5.94-3.92a6.26 6.26 0 0 0 1.75-4.7V55.85c0-1.87-.26-3.69 2.45-4.06a2.68 2.68 0 0 0 2-2.71c.06-1.77 1.82-2.2 2.51-3.47.35-.63 1-.2 1.41.2 5.26 5.64 11.67 4.23 17.7 2.32s12.19-3.81 18.28-5.7c.73-.23 1.3-1 2-1.45 2.52-1.74 4.8-3.78 8.31-3.49s6.24-1.58 8.41-4.21 5.52-2.14 8.32-2.6c1.8-.3 2.87 1.8 2.28 3.85a12.09 12.09 0 0 1-2.59 4.82c-1.57 1.76-2.65 3.77-1.74 6.27a2.46 2.46 0 0 1-.87 3.15c-1.43 1.09-1.81 2.93-2.87 4.32a2.2 2.2 0 0 0 .38 3 2.39 2.39 0 0 0 3 .61c2.59-1.8 6-1.76 8.37-4.06.7-.69 1.29-.59 2.13 0 3.74 2.82 8.19 4.25 12.35 6.26 2.64 1.28 5.57 1.38 8.14 2.91a7.77 7.77 0 0 1 3.85 4.06c.51 1.38 1.42 2.65 1.7 4.07.93 4.69 4.11 6.21 8.39 7.29 14 3.54 27.9 7.54 41.87 11.21 5.23 1.38 9.29 4.79 13.83 7.34 2.8 1.57 5.74 1.9 8.78 2.54 3.56.75 7 .49 10.41.88 5.92.68 11.64 3.13 17.55 4.48 3.28.75 4.22 3.25 2.63 6.18-1.24 2.29-.81 3.72 1.54 5s4.88 1.28 7.24 2.34a16.05 16.05 0 0 1 4.71 2.59c1 .93 1.88 1.69 1.3 3.25a2.34 2.34 0 0 0 .2 1.85c1.07 1.61.06 3.22.15 4.59.27 3.87-.3 6.94-2.85 9.94-.69.81-.52 2.79-.71 4.23a3 3 0 0 0 2.51 3.42 2.87 2.87 0 0 0 1.13 0c2.49-.31 5.06-.3 7.77-2.49-1.18 2.75-2 4.56-2.74 6.43-2.12 5.54-1.27 8.68 3.26 12.42 1.82 1.49 1.19 6.76-.93 7.84a23.71 23.71 0 0 1-5.28 1.55c-2.46.6-4.3 1.74-3.81 4.75.07.44.12 1.07-.13 1.34-2.7 2.94-3.42 7-5.94 10.08-1.92 2.31-1.52 5.39-2.7 8a13.06 13.06 0 0 0-.46 2.15c-.83 3.13-.14 4.66 2.56 5.64s4.52.34 5.81-2.4a9.37 9.37 0 0 1 5.28-4.61 7.26 7.26 0 0 0 4.4-5.28 27.5 27.5 0 0 1 2.85-6.24c.8-1.41 1.65-2.61 3.92-2 1.83.51 3.07-1.75 4.8-2.49a8.75 8.75 0 0 0 5.33-6.2 10.82 10.82 0 0 1 4.39-7.08c1.36-.91 1.59-2.83 1.81-4.48.24-1.85.74-3.13 3-3.61a6 6 0 0 0 4.28-4.25 7.89 7.89 0 0 1 2-3.86 1 1 0 0 1 1.4-.2.87.87 0 0 1 .24.28z"/>
  </g>
  <g id="_Group_2" data-name="Group 2" fill="#f5eed9" stroke="#666" stroke-miterlimit="10">
    <path d="M495.27 141.16V145c-.21.3-.36.76-.65.87-3.43 1.39-2.66 4.63-3.11 7.24a9.47 9.47 0 0 1-3.24 5.62c-1.78 1.72-4.1 3.82-3.29 7.28.55 2.38-1.61 4.18-3 5.78-3 3.53-5.26 7.26-6.06 11.85a11.75 11.75 0 0 1-2.73 5.37c-2.87 3.43-3.74 7.5-4.31 11.73a28.16 28.16 0 0 1-1.81 8c-.85 1.88-.23 3.59.69 5.26 2.13 3.86 1.49 7.71-2.27 9.67C461.2 226 460 229.94 459 234c-.56 2.3-1.8 4.42-1.74 6.91a21.29 21.29 0 0 0 1.12 6.43 11.85 11.85 0 0 1-1.28 10.83c-2.13 3-3.79 6-3.27 9.89a5.63 5.63 0 0 1-1.12 3.65c-2.4 3.82-3.19 8.17-4.17 12.45-.1.45-.33 1-.14 1.35 1.9 3.16.32 6.83 1.55 10.07a1.55 1.55 0 0 1 .09 1.08c-1.49 2.67-.15 4.74 1.14 7a7.41 7.41 0 0 1 .8 5.62 3.25 3.25 0 0 0 1.07 3.25c3.09 3.06 2.87 6.93 1.68 10.31-1.44 4.08-1.32 8.1-1.3 12.21 0 1.2.14 2.4-.73 3.4h-29.27a6.82 6.82 0 0 0-3.26-.36c-19.24-.08-38.49.12-57.73-.29-17-.37-34.06-.17-51.08-.45-2.3 0-3.64-.54-4.19-3.2-1.34-6.42-2.54-7.29-9.15-8.29l-3.54-.56c-6.28-1-9.69-4.89-9.9-11.27 0-1 .18-2.13-.6-2.9-3-2.9-2.69-6.75-3-10.35a25.16 25.16 0 0 0-.78-5.1c-1-3.4.29-6.33 2.36-9 3.14-4 2.45-6.44-2.32-7.92-.9-.28-2.07-.55-2-1.59.22-3.15-1-6.06-1.22-9.19a91 91 0 0 0-1.53-12.74 6.11 6.11 0 0 1-.31-2.44c1.29-5.22-1.48-9.27-3.89-13.33s-5.29-7.07-10.29-7.8c-1.68-.25-3.25-1.66-4.72-2.76-6-4.47-11.46-9.25-14.2-16.7-1.91-5.2-7.08-7.28-12-8.91-3.54-1.18-6.33-3-7.87-6.33a4.93 4.93 0 0 0-4.7-3.17 16.21 16.21 0 0 1-11.93-6 55.73 55.73 0 0 0-6.73-6.12c-1.84-1.52-2.58-3-1-5.16a4.1 4.1 0 0 0 1-2.52c-.08-5.39 1.76-10.9-1.18-16.11a2.38 2.38 0 0 1 1-3.17c1.59-1.12 1.64-2.62 1.21-4.18-.83-3-.19-6-.28-9.07a2.74 2.74 0 0 1 1-2.23c2.21-1.71 2.19-4.59 3.6-6.73.61-.94-3.66-9.56-4.77-9.87a6.93 6.93 0 0 0-1.64-.11c-4-.12-5.22-1.3-5.27-5.35s.36-7.69 4.05-10.26c1.79-1.24 2.56-3.17 3-5.38a10.32 10.32 0 0 1 5.58-7.45c2.18-1.12 4.18-2.82 6.2-3.76 2.79-1.31 4.76-4.29 8.29-4.22 1.47 0 3.63-3.81 3.63-5.88V44.31c0-2.34-.09-4.59 3.27-4.43.88 0 1.19-.75 1.41-1.48a5.52 5.52 0 0 1 1.05-2.16c3.91-4.4 4-4.49 8.69-.91 4.3 3.26 9 2.46 13.31.88 5.84-2.16 12-3.23 17.65-5.95a33.39 33.39 0 0 0 8.47-5.52c1.33-1.25 2.59-2.14 4.58-.76s3.61-.61 5-1.71c2-1.68 3.66-3.93 6.81-3.11a1.46 1.46 0 0 0 1-.35c1.19-.89 2.23-1.73 4-1a8.54 8.54 0 0 1 5 5.08 3 3 0 0 1-.33 2.39 34.55 34.55 0 0 1-3.71 7.07 4.35 4.35 0 0 0-.85 4.38 3.76 3.76 0 0 1-1.2 4.27c-.58.54-1.4 1-1.32 2.2 2.11-.46 4.33.08 5-3.2.64-3 2.55-3.28 4.67-.77a21.08 21.08 0 0 0 12.13 6.87c4.22.85 7.63 2.9 11.32 4.64a4.85 4.85 0 0 1 2.33 2.61c1.2 2.69 2.56 5.33 3.53 8.1a4.71 4.71 0 0 0 3.68 3.21c14.22 3.8 28.39 7.81 42.67 11.42 5.82 1.46 10.41 5 15.44 7.79 1.78 1 3.44 2 5.61 1.92 2.36-.06 4.77 0 6.82 1.53a1.2 1.2 0 0 0 1.31 0c3.28-1.75 6.29-.12 9.46.57 4.25.92 8.17 2.94 12.56 3.43 3.19.36 6.34 4 6.71 7.15a3.3 3.3 0 0 1-.87 2.54c-1.75 2.13 0 2.57 1.46 2.75a18.72 18.72 0 0 1 11.87 5.74c1.23 1.3 2.28 2.72 1.49 4.7-.32.79.15 1.4.45 2.07s.82 1.6.57 2c-1.48 2.75-.54 5.75-1.11 8.57a4.18 4.18 0 0 1-1.77 2.72c-1.68 1.13-.86 3.07-1.76 4.6 2.35.45 4.43.54 6.33-.93 1.17-.91 2.49-1.53 3.63-.08s2.25 2.89.9 4.71a18.66 18.66 0 0 0-2.25 4.4c-2 5-1 7.52 3.88 10 1.46.74 2.18 1.8 1.26 3.32a8.77 8.77 0 0 0-1.12 4.45c-.13 3.32-2 5-7.16 5.91-2.33.43-4.27.66-3.47 3.77a1.3 1.3 0 0 1-.29 1c-3.05 3.15-4.3 7.39-6.48 11.06a24.42 24.42 0 0 0-2.76 9.59c-.09.81.39 1.19 1.08 1.35A1.41 1.41 0 0 0 445 192c1.3-3.26 4-4.9 7-6.25a5.1 5.1 0 0 0 2.7-3.61 23.92 23.92 0 0 1 4.87-9.12c2-2.32 4.92-2.23 7.42-3.22 2.08-.83 3.66-1.89 4.38-4.15a22 22 0 0 1 5.07-9.05c1.79-1.84 1.22-4.74 2.51-6.92.64-1.08 1.25-1.77 2.5-1.74 2.08.06 3.17-1.15 3.82-2.92a17.92 17.92 0 0 1 1.59-3.48c2.03-3.13 5.92-3.36 8.41-.38zm-4.1 3.43a.89.89 0 0 0 .47-1.17.75.75 0 0 0-.15-.24 1 1 0 0 0-1.36-.39 1 1 0 0 0-.29.24 7.89 7.89 0 0 0-2 3.86 6 6 0 0 1-4.28 4.25c-2.25.48-2.76 1.76-3 3.61-.22 1.65-.44 3.58-1.81 4.48a10.82 10.82 0 0 0-4.39 7.08 8.75 8.75 0 0 1-5.33 6.2c-1.74.74-3 3-4.8 2.49-2.27-.62-3.12.57-3.92 2a27.07 27.07 0 0 0-2.85 6.24 7.26 7.26 0 0 1-4.4 5.28 9.37 9.37 0 0 0-5.28 4.61c-1.29 2.74-3 3.4-5.81 2.4s-3.39-2.51-2.56-5.64a13.06 13.06 0 0 1 .46-2.15c1.18-2.56.78-5.65 2.7-8 2.53-3 3.24-7.14 5.94-10.08.25-.27.2-.9.13-1.34-.5-3 1.35-4.16 3.81-4.75a23.35 23.35 0 0 0 5.25-1.57c2.12-1.08 2.75-6.35.93-7.84-4.53-3.74-5.38-6.87-3.26-12.42.71-1.86 1.56-3.67 2.74-6.43-2.71 2.19-5.28 2.18-7.77 2.49a3 3 0 0 1-3.6-2.25 3.06 3.06 0 0 1 0-1.13c.19-1.44 0-3.42.71-4.23 2.54-3 3.12-6.07 2.85-9.94-.1-1.36.91-3-.15-4.59a2.34 2.34 0 0 1-.2-1.85c.59-1.56-.29-2.32-1.3-3.25a16.05 16.05 0 0 0-4.75-2.56c-2.37-1.06-5-1.13-7.24-2.34s-2.79-2.68-1.54-5c1.59-2.93.65-5.43-2.63-6.18-5.91-1.35-11.62-3.8-17.55-4.48-3.4-.39-6.85-.13-10.41-.88-3-.64-6-1-8.78-2.54-4.54-2.56-8.6-6-13.83-7.34-14-3.67-27.86-7.67-41.87-11.21-4.28-1.08-7.46-2.6-8.39-7.29-.28-1.41-1.19-2.69-1.7-4.07a7.77 7.77 0 0 0-3.78-4.06c-2.57-1.53-5.5-1.62-8.14-2.91-4.16-2-8.62-3.44-12.35-6.26-.85-.64-1.44-.73-2.13 0-2.33 2.29-5.78 2.25-8.37 4.06a2.39 2.39 0 0 1-3-.61 2.2 2.2 0 0 1-.38-3c1.06-1.39 1.45-3.22 2.87-4.32a2.46 2.46 0 0 0 .87-3.15c-.91-2.49.17-4.51 1.74-6.27a12.09 12.09 0 0 0 2.59-4.82c.59-2-.48-4.14-2.28-3.85-2.8.46-6.12-.08-8.32 2.6s-4.91 4.5-8.41 4.21-5.79 1.75-8.31 3.49c-.67.46-1.23 1.22-2 1.45-6.1 1.88-12.2 3.76-18.28 5.7s-12.44 3.33-17.7-2.32c-.38-.4-1.06-.83-1.41-.2-.7 1.27-2.45 1.7-2.51 3.47a2.68 2.68 0 0 1-2 2.71c-2.71.38-2.45 2.19-2.45 4.06v34.23a6.26 6.26 0 0 1-1.75 4.7c-1.71 1.84-2.72 4.42-5.94 3.92-.19 0-.43.31-.66.46-3.07 2-6 4.35-9.4 5.74a9.41 9.41 0 0 0-6.21 7.13c-.52 2.49-1.49 4.84-3.66 6.29-2.74 1.84-3.17 4.49-3.25 7.45 0 2.07.59 3.17 2.83 3a4.89 4.89 0 0 1 3.42.82c.84.6 6 9.94 5.84 10.93a22.85 22.85 0 0 1-3.29 8.29 8.13 8.13 0 0 0-1.65 4.72 30.22 30.22 0 0 0 .41 6.58c.46 2 .38 4.08-1.52 5.53a1.19 1.19 0 0 0-.35 1.65c2.45 5.38 1.86 11.21.45 16.39-1.18 4.32.38 6.11 3.09 8.23a12 12 0 0 1 2.46 2.2c3 4.21 7.27 6 12.31 6.26a5.48 5.48 0 0 1 5 3.7c1.34 3.12 3.81 4.58 6.94 5.75 5.41 2 11.23 4.24 13.33 10.22 2.51 7.18 7.93 11.51 13.53 15.84a8.35 8.35 0 0 0 3.56 2c4.9.65 8.31 3.54 10.74 7.37 3.09 4.89 7 9.64 5.66 16.18-.21 1 .29 2.18.34 3.28.23 4.81 1.67 9.44 1.65 14.34 0 2.06-.13 5 2.55 6.45 5.8 3.23 6.42 7.18 2.07 12.33a6.78 6.78 0 0 0-1.38 7.42 11.29 11.29 0 0 1 .55 4c.09 2.71-.21 5.65 1.53 8a10.77 10.77 0 0 1 2.14 6.39c.18 4.63 2.38 7 7 7.82q3 .54 6 1c4.13.75 7.56 2.2 8.42 7 .55 3.1 2.49 4.13 5.86 4.13 20.16 0 40.32.36 60.48.53 24.12.2 48.24.33 72.36.55 2.06 0 2.77-.62 2.72-2.68a25.93 25.93 0 0 1 1.45-10.55c1.12-2.82 1.16-5.93-1.38-8.46a5.54 5.54 0 0 1-1.36-5.11 6 6 0 0 0-2-6 3.15 3.15 0 0 1-.78-4.42 3.3 3.3 0 0 0 .5-2.59c-.88-3.38.12-7-1.36-10.36-.25-.56.21-1.42.33-2.14a38.53 38.53 0 0 1 4.55-13.16 4.14 4.14 0 0 0 .61-2.66c-.55-3.95 1.06-7.12 3.35-10.17s2.3-6.4 1-9.7a14 14 0 0 1-.59-8.93 91.7 91.7 0 0 1 3-10 12.49 12.49 0 0 1 6-7.1c2.68-1.44 3-3.39 1.47-6.22-1.17-2.24-2.1-4.59-1-7.11a23.87 23.87 0 0 0 1.71-7.21c.48-4 1-8.32 3.49-11.51 4.84-6.24 4.78-15 10.9-20.46.12-.1.07-.39.18-.51 1.59-2 1-4.55 2-6.74 1.61-3.63 5.74-6.24 4.55-11a.33.33 0 0 1 .08-.25c2.17-1.33 1.22-4.87 4.08-5.82z"/>
    <path d="M491.49 143.18a.89.89 0 0 1-.08 1.26 1 1 0 0 1-.24.15c-2.86 1-1.91 4.49-4.08 5.87a.33.33 0 0 0-.08.25c1.19 4.78-2.94 7.4-4.55 11-1 2.19-.4 4.77-2 6.74-.11.13-.06.41-.18.51-6.12 5.47-6.06 14.22-10.9 20.46-2.48 3.19-3 7.46-3.49 11.51a23.87 23.87 0 0 1-1.71 7.21c-1.14 2.53-.21 4.87 1 7.11 1.48 2.83 1.21 4.79-1.47 6.22a12.49 12.49 0 0 0-6 7.1c-1.27 3.29-2 6.68-3 10a14 14 0 0 0 .59 8.93c1.27 3.29 1.21 6.74-1 9.7s-3.9 6.22-3.35 10.17a4.14 4.14 0 0 1-.61 2.66 38.53 38.53 0 0 0-4.53 13.21c-.12.72-.57 1.59-.33 2.14 1.48 3.34.48 7 1.36 10.36a3.3 3.3 0 0 1-.5 2.59 3.16 3.16 0 0 0 .78 4.42 6 6 0 0 1 2 6 5.54 5.54 0 0 0 1.36 5.11c2.54 2.53 2.49 5.64 1.38 8.46a25.93 25.93 0 0 0-1.45 10.55c.06 2.06-.66 2.7-2.72 2.68-24.12-.23-48.24-.35-72.36-.55-20.16-.17-40.32-.52-60.48-.53-3.37 0-5.31-1-5.86-4.13-.86-4.82-4.29-6.27-8.42-7q-3-.54-6-1c-4.6-.83-6.8-3.19-7-7.82a10.77 10.77 0 0 0-2.14-6.39c-1.74-2.33-1.44-5.27-1.53-8a11.29 11.29 0 0 0-.55-4 6.78 6.78 0 0 1 1.38-7.42c4.35-5.14 3.73-9.1-2.07-12.33-2.69-1.5-2.56-4.39-2.55-6.45 0-4.89-1.42-9.53-1.65-14.34 0-1.1-.55-2.25-.34-3.28 1.32-6.53-2.57-11.29-5.66-16.18-2.43-3.84-5.84-6.73-10.74-7.37a8.35 8.35 0 0 1-3.56-2c-5.6-4.33-11-8.65-13.53-15.84-2.09-6-7.92-8.18-13.33-10.22-3.12-1.18-5.59-2.64-6.94-5.75a5.47 5.47 0 0 0-5-3.7c-5-.23-9.26-2-12.31-6.26a12 12 0 0 0-2.46-2.2c-2.72-2.12-4.27-3.91-3.09-8.23 1.41-5.18 2-11-.45-16.39a1.19 1.19 0 0 1 .3-1.66c1.9-1.45 2-3.54 1.52-5.53a30.22 30.22 0 0 1-.41-6.58 8.13 8.13 0 0 1 1.65-4.72 22.85 22.85 0 0 0 3.29-8.29c.17-1-5-10.33-5.84-10.93a4.89 4.89 0 0 0-3.42-.82c-2.24.2-2.88-.89-2.83-3 .08-3 .51-5.61 3.25-7.45 2.17-1.46 3.14-3.8 3.66-6.29a9.41 9.41 0 0 1 6.21-7.13c3.43-1.39 6.33-3.72 9.4-5.74.23-.15.47-.49.66-.46 3.22.5 4.23-2.08 5.94-3.92a6.26 6.26 0 0 0 1.75-4.7V46.67c0-1.87-.26-3.69 2.45-4.06a2.68 2.68 0 0 0 2-2.71c.06-1.77 1.82-2.2 2.51-3.47.35-.63 1-.2 1.41.2 5.26 5.64 11.67 4.23 17.7 2.32s12.19-3.81 18.28-5.7c.73-.23 1.3-1 2-1.45 2.52-1.74 4.8-3.78 8.31-3.49s6.24-1.58 8.41-4.21 5.52-2.14 8.32-2.6c1.8-.3 2.87 1.8 2.28 3.85a12.09 12.09 0 0 1-2.59 4.82c-1.57 1.76-2.65 3.77-1.74 6.27a2.46 2.46 0 0 1-.87 3.15c-1.43 1.09-1.81 2.93-2.87 4.32a2.2 2.2 0 0 0 .38 3 2.39 2.39 0 0 0 3 .61c2.59-1.8 6-1.76 8.37-4.06.7-.69 1.29-.59 2.13 0 3.74 2.82 8.19 4.25 12.35 6.26 2.64 1.28 5.57 1.38 8.14 2.91a7.77 7.77 0 0 1 3.85 4.06c.51 1.38 1.42 2.65 1.7 4.07.93 4.69 4.11 6.21 8.39 7.29 14 3.54 27.9 7.54 41.87 11.21 5.23 1.38 9.29 4.79 13.83 7.34 2.8 1.57 5.74 1.9 8.78 2.54 3.56.75 7 .49 10.41.88 5.92.68 11.64 3.13 17.55 4.48 3.28.75 4.22 3.25 2.63 6.18-1.24 2.29-.81 3.72 1.54 5s4.88 1.28 7.24 2.34a16.05 16.05 0 0 1 4.71 2.59c1 .93 1.88 1.69 1.3 3.25a2.34 2.34 0 0 0 .2 1.85c1.07 1.61.06 3.22.15 4.59.27 3.87-.3 6.94-2.85 9.94-.69.81-.52 2.79-.71 4.23a3 3 0 0 0 2.51 3.42 2.87 2.87 0 0 0 1.13 0c2.49-.31 5.06-.3 7.77-2.49-1.18 2.75-2 4.56-2.74 6.43-2.12 5.54-1.27 8.68 3.26 12.42 1.82 1.49 1.19 6.76-.93 7.84a23.71 23.71 0 0 1-5.28 1.55c-2.46.6-4.3 1.74-3.81 4.75.07.44.12 1.07-.13 1.34-2.7 2.94-3.42 7-5.94 10.08-1.92 2.31-1.52 5.39-2.7 8a13.06 13.06 0 0 0-.46 2.15c-.83 3.13-.14 4.66 2.56 5.64s4.52.34 5.81-2.4a9.33 9.33 0 0 1 5.21-4.7 7.26 7.26 0 0 0 4.4-5.28 27.07 27.07 0 0 1 2.85-6.24c.8-1.41 1.65-2.61 3.92-2 1.83.51 3.07-1.75 4.8-2.49a8.75 8.75 0 0 0 5.33-6.2 10.82 10.82 0 0 1 4.39-7.08c1.36-.91 1.59-2.83 1.81-4.48.24-1.85.74-3.13 3-3.61a6 6 0 0 0 4.28-4.25 7.89 7.89 0 0 1 2-3.86 1 1 0 0 1 1.4-.21 1 1 0 0 1 .31.38z"/>
  </g>
  <path fill="#c3002f" d="M248.8 107.27h8.1v8.1h-8.1zM337.24 180.49h8.1v8.1h-8.1zM368.46 98.8h8.1v8.1h-8.1zM383.66 121.99h8.1v8.1h-8.1zM475.2 162.03h8.1v8.1h-8.1zM373.62 208.23h8.1v8.1h-8.1zM364.48 265.34h8.1v8.1h-8.1zM378.78 266.61h8.1v8.1h-8.1zM373.62 288.99h8.1v8.1h-8.1zM360.53 287.54h8.1v8.1h-8.1zM364.48 298.04h8.1v8.1h-8.1zM309.78 307.71h8.1v8.1h-8.1z"/>
  <path d="M189.56 195.23V214h-56v-18.77h16.34v-45.15l-13.05 4.51L131 137l22.45-8.54h21.11v66.75zM264.46 168.63c-2 2.56-7.32 5.61-13.3 8.05l-20.87 8.66c-3.41 1.22-5.49 2.81-6.1 3.66s-1 2.57-1 5v1.59h24.65V182.9h21.36V214h-70.51v-15.5c0-11.47.85-17.33 4.15-21.48 2.56-3.29 6.47-6 12.32-8.29l21.84-8.64c4.15-1.59 5.37-2.08 6.1-2.93s1-1.71 1-4c0-2.08-.12-3.9-1-4.76s-2.56-.73-5-.73h-7.56c-3.17 0-4.39.24-5.13 1s-1.22 3.41-1.22 11.71h-23.42c-.12-18.43 1.46-24.16 5.12-27.82 2.69-2.69 7.2-3.9 15.13-3.9h29.16c6.47 0 10.62 1.58 12.93 4.15 3.9 3.9 5.61 10.73 5.24 21.59-.35 8.74-1.57 11.3-3.89 14.23z" fill="#666"/>
  <path d="M185.47 200.35v18.79h-56v-18.79h16.35V155.2l-13 4.51-5.86-17.57 22.45-8.54h21.11v66.75zM260.36 173.75c-2 2.56-7.32 5.61-13.3 8.05l-20.87 8.66c-3.41 1.22-5.49 2.81-6.1 3.66s-1 2.57-1 5v1.59h24.65V188h21.36v31.12h-70.5v-15.5c0-11.47.85-17.33 4.15-21.48 2.56-3.29 6.47-6 12.32-8.29l21.84-8.66c4.15-1.59 5.37-2.08 6.1-2.93s1-1.71 1-4c0-2.08-.12-3.9-1-4.76s-2.56-.73-5-.73h-7.56c-3.17 0-4.39.24-5.13 1s-1.22 3.41-1.22 11.71h-23.43c-.12-18.43 1.46-24.16 5.12-27.82 2.69-2.69 7.2-3.9 15.13-3.9h29.16c6.47 0 10.62 1.58 12.93 4.15 3.9 3.9 5.61 10.73 5.24 21.59-.35 8.76-1.57 11.32-3.89 14.25z" fill="none" stroke="#4d4d4d" stroke-miterlimit="10"/>
  <path d="M99.22 259.3l-2.44-5.78h-10l-2.44 5.78h-4.43l11.64-25.58h.62l11.6 25.58zm-7.44-17.63l-3.58 8.43h7.16zM113.93 267a19.27 19.27 0 0 1-4.89-.72l.38-3.44a12.89 12.89 0 0 0 3.89.69c2.44 0 3.58-1 3.58-3.41v-1.79a6.24 6.24 0 0 1-4 1.24c-4.13 0-7.23-2.79-7.23-7.44 0-4.34 3.3-7.81 7.19-7.81a6.48 6.48 0 0 1 4.13 1.34v-1.06h3.75v15.46c.05 5.12-2.53 6.94-6.8 6.94zm3-18.07a4.52 4.52 0 0 0-3.3-1.48c-2.38 0-4 1.86-4 4.72 0 2.48 1.45 4.34 4.1 4.34a4.12 4.12 0 0 0 3.2-1.48zM129.32 249.62v9.67h-3.92V244.6h3.79v2.4a6 6 0 0 1 5.23-2.69v3.86c-2.28-.23-4.21.18-5.1 1.45zM139.89 241.81a2.31 2.31 0 1 1 .3 0zm-2 17.49v-14.7h3.92v14.7zM154.35 259.57c-5.2 0-8.3-3.41-8.3-7.57s3.1-7.68 8.3-7.68a9.66 9.66 0 0 1 4.92 1.48l-1.27 2.72a7.56 7.56 0 0 0-3.72-1 4.12 4.12 0 0 0-4.37 4.48 4.33 4.33 0 0 0 4.24 4.42h.34a7.44 7.44 0 0 0 3.68-1l1.1 2.75a9.69 9.69 0 0 1-4.92 1.4zM172.57 259.3V257a8 8 0 0 1-5.34 2.55c-3.24 0-4.85-2-4.85-4.92v-10h3.92v9.09c0 1.82.83 2.62 2.34 2.62a5.26 5.26 0 0 0 3.79-1.93v-9.81h3.92v14.7zM181 259.3v-25.24h3.89v25.24zM194.78 247.76v6.75c0 1.31.62 1.79 1.76 1.79a6.06 6.06 0 0 0 1.27-.17l.72 3a14.36 14.36 0 0 1-3.13.41c-2.75 0-4.51-1.34-4.51-5.27v-6.54h-2.79v-.52l2.79-2.79v-2.37l3.89-2.45v5h4.1v3.17zM212.37 259.3V257a8 8 0 0 1-5.34 2.55c-3.24 0-4.85-2-4.85-4.92v-10h3.92v9.09c0 1.82.83 2.62 2.34 2.62a5.26 5.26 0 0 0 3.79-1.93v-9.81h3.92v14.7zM224.7 249.62v9.67h-3.92V244.6h3.79v2.4a6 6 0 0 1 5.23-2.69v3.86c-2.28-.23-4.2.18-5.1 1.45zM241.3 259.3v-1.41a5.77 5.77 0 0 1-4.27 1.69c-2.86 0-5.16-1.69-5.16-4.65 0-2.62 2.1-4.58 5.34-4.58a8.32 8.32 0 0 1 4 .93v-.62c0-2.27-1.2-3.27-3.55-3.27a13 13 0 0 0-3.66.61l-.45-2.93a18 18 0 0 1 4.72-.76c4.61 0 6.78 2.17 6.78 6.47v8.5zm-.14-5.51a4.8 4.8 0 0 0-3-1c-1.48 0-2.58.79-2.58 2.1s1 2.13 2.65 2.13a3.61 3.61 0 0 0 3-1.41zM249.53 259.3v-25.24h3.89v25.24zM139 300.62l-5.51-9.09h-1.34c-.83 0-1.69 0-2.51-.07v9.12h-4.3v-25a54.54 54.54 0 0 1 6.64-.41c7.16 0 10.33 3.48 10.33 8a7.74 7.74 0 0 1-4.92 7.3l6.61 10.15zm-6.47-21.55a15.5 15.5 0 0 0-2.89.21v8.61a18.65 18.65 0 0 0 2.48.14c3.75 0 5.65-1.76 5.65-4.65 0-2.56-1.91-4.31-5.22-4.31zM160 294.46h-10.19c.31 2.07 1.55 3.37 4.58 3.37a15.56 15.56 0 0 0 4.27-.79l.48 3a20.74 20.74 0 0 1-5.13.83c-5.51 0-8.06-3.41-8.06-7.57 0-4 2.65-7.68 7.44-7.68 4.41 0 6.71 3.13 6.71 7.06a9.62 9.62 0 0 1-.1 1.78zm-3.38-2.46c-.17-2-1.34-3.3-3.3-3.3s-3.17 1.2-3.44 3.3zM168.57 300.89a9.91 9.91 0 0 1-5.82-1.93l1.51-2.79a7.66 7.66 0 0 0 4.23 1.72c1.45 0 2.1-.59 2.1-1.52 0-2.34-7-1.41-7-6.09 0-2.65 2.27-4.65 5.61-4.65A10.13 10.13 0 0 1 174 287l-1.2 2.86a7.49 7.49 0 0 0-3.79-1.27c-1.31 0-1.93.62-1.93 1.38 0 2.17 7.13 1.34 7.13 6.23.04 2.7-2.37 4.69-5.64 4.69zM191.33 294.46h-10.19c.31 2.07 1.55 3.37 4.58 3.37A16 16 0 0 0 190 297l.48 3a20.74 20.74 0 0 1-5.13.83c-5.51 0-8.06-3.41-8.06-7.57 0-4 2.65-7.68 7.44-7.68 4.41 0 6.71 3.13 6.71 7.06a10.06 10.06 0 0 1-.11 1.82zM188 292c-.17-2-1.34-3.3-3.3-3.3s-3.17 1.2-3.44 3.3zM203.76 300.62v-1.41a5.77 5.77 0 0 1-4.27 1.69c-2.86 0-5.16-1.69-5.16-4.65 0-2.62 2.1-4.58 5.34-4.58a8.32 8.32 0 0 1 4 .93v-.6c0-2.27-1.2-3.27-3.55-3.27a12.93 12.93 0 0 0-3.65.62l-.47-3a18 18 0 0 1 4.72-.76c4.61 0 6.78 2.17 6.78 6.47v8.5zm-.14-5.51a4.8 4.8 0 0 0-3-1c-1.48 0-2.58.79-2.58 2.1s1 2.13 2.65 2.13a3.61 3.61 0 0 0 3-1.41zM215.85 290.94v9.67h-3.92v-14.7h3.79v2.41a6 6 0 0 1 5.23-2.69v3.86c-2.28-.23-4.21.18-5.1 1.45zM231.52 300.89c-5.2 0-8.3-3.41-8.3-7.57s3.1-7.68 8.3-7.68a9.66 9.66 0 0 1 4.92 1.48l-1.27 2.72a7.56 7.56 0 0 0-3.72-1 4.12 4.12 0 0 0-4.37 4.48 4.33 4.33 0 0 0 4.24 4.42h.34a7.44 7.44 0 0 0 3.68-1l1.1 2.75a9.69 9.69 0 0 1-4.92 1.4zM249.84 300.62v-9.09c0-1.86-.76-2.65-2.31-2.65a5.88 5.88 0 0 0-3.92 2.06v9.67h-3.92v-25.23h3.89v12.91a7.25 7.25 0 0 1 5.34-2.65c3.24 0 4.85 2 4.85 4.92v10.05zM143.71 342.35a14.9 14.9 0 0 1-7.92-2.48l1.48-3.85a11.69 11.69 0 0 0 6.58 2.34c2.65 0 3.82-1.55 3.82-3.3s-.76-2.86-4.75-4.54c-4.41-1.86-6-4.13-6-7.16 0-3.65 3-7.06 8.3-7.06a11.92 11.92 0 0 1 6.33 1.82l-1.38 3.79a9.74 9.74 0 0 0-5.06-1.79c-2.65 0-3.89 1.45-3.89 3.13s1.24 2.68 4.37 4.06c5 2.17 6.44 4.2 6.44 7.51-.03 4.06-3.12 7.53-8.32 7.53zM161.24 330.41v6.75c0 1.31.62 1.79 1.76 1.79a6.06 6.06 0 0 0 1.27-.17l.72 3a14.36 14.36 0 0 1-3.13.41c-2.75 0-4.51-1.34-4.51-5.27v-6.54h-2.79v-.52l2.79-2.79v-2.38l3.89-2.44v5h4.1v3.17zM177.28 341.94v-1.41a5.77 5.77 0 0 1-4.27 1.69c-2.86 0-5.16-1.69-5.16-4.65 0-2.62 2.1-4.58 5.34-4.58a8.32 8.32 0 0 1 4 .93v-.62c0-2.27-1.2-3.27-3.55-3.27a12.93 12.93 0 0 0-3.65.62l-.45-2.93a18 18 0 0 1 4.72-.76c4.61 0 6.78 2.17 6.78 6.47v8.5zm-.14-5.51a4.8 4.8 0 0 0-3-1c-1.48 0-2.58.79-2.58 2.1s1 2.13 2.65 2.13a3.61 3.61 0 0 0 3-1.41zM190.44 330.41v6.75c0 1.31.62 1.79 1.76 1.79a6.06 6.06 0 0 0 1.27-.17l.72 3a14.36 14.36 0 0 1-3.13.41c-2.75 0-4.51-1.34-4.51-5.27v-6.54h-2.79v-.52l2.79-2.79v-2.38l3.89-2.44v5h4.1v3.17zM200.11 324.45a2.31 2.31 0 1 1 2.15-2.15 2.3 2.3 0 0 1-2.15 2.15zm-2 17.49v-14.7H202v14.7zM214 342.21a7.63 7.63 0 1 1 7.64-7.64 7.41 7.41 0 0 1-7.17 7.64zm0-12.21c-2.34 0-3.82 1.79-3.82 4.61s1.48 4.65 3.82 4.65 3.79-1.79 3.79-4.65S216.3 330 214 330zM235.75 341.94v-9.09c0-1.86-.69-2.65-2.24-2.65a5.72 5.72 0 0 0-3.89 2.07v9.67h-3.92v-14.7h3.79v2.44a7.76 7.76 0 0 1 5.44-2.72c3.24 0 4.75 2 4.75 4.92v10.05zM248.84 342.21a9.91 9.91 0 0 1-5.82-1.93l1.51-2.79a7.66 7.66 0 0 0 4.23 1.72c1.45 0 2.1-.59 2.1-1.52 0-2.34-7-1.41-7-6.09 0-2.65 2.27-4.65 5.61-4.65a10.22 10.22 0 0 1 4.82 1.38l-1.2 2.86a7.49 7.49 0 0 0-3.79-1.27c-1.31 0-1.93.62-1.93 1.38 0 2.17 7.13 1.34 7.13 6.23.02 2.69-2.39 4.68-5.66 4.68z" fill="#4d4d4d"/>
</svg>
                                    </div>

                                    <div class="rs_svgs"><img src="<?php echo get_template_directory_uri(); ?>/images/infographics/invention-disclosures-18-19.svg" />

                                    </div>

                                    <div class="rs_svgs">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 380">
  <defs>
    <clipPath id="clip-path">
      <path fill="none" d="M489 417.38l139-232.23-132.6-73.84-139 232.22L489 417.38z"/>
    </clipPath>
  </defs>
  <path d="M93.46 173.24c-19.83 0-33.22-14.57-33.22-34.91 0-23.56 14.41-48.3 53.55-69.15l5.76 10.17C98.71 90.88 85 102.23 78.21 116.47c5.25-5.42 10.85-7.63 19.32-7.63 16.61 0 28.81 13.73 28.81 30.17 0 16.99-12.03 34.23-32.88 34.23zm.68-53.89c-13.39 0-20.68 8.81-20.68 21.35 0 11.69 8.81 21.18 20 21.18 12 0 19.83-10 19.83-21 0-12.55-7.29-21.53-19.15-21.53z" fill="#c9c9c9"/>
  <path d="M97.09 168.4c-19.83 0-33.22-14.57-33.22-34.91 0-23.56 14.41-48.3 53.55-69.15l5.76 10.17C102.35 86 88.62 97.39 81.84 111.62c5.25-5.42 10.85-7.63 19.32-7.63 16.61 0 28.81 13.73 28.81 30.17.03 16.95-12.03 34.24-32.88 34.24zm.68-53.89c-13.39 0-20.68 8.81-20.68 21.35 0 11.69 8.81 21.18 20 21.18 12 0 19.83-10 19.83-21 0-12.55-7.29-21.53-19.15-21.53z" fill="#4d4d4d"/>
  <g clip-path="url(#clip-path)" fill="#4d4d4d">
    <path d="M422.43 337.14c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68 101.26 43.82 101.26 97.68-45.42 97.68-101.26 97.68zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.94 96.63 100.18 96.63 100.18-43.35 100.18-96.63-44.94-96.63-100.18-96.63z"/>
    <path d="M421.61 336.62c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68 101.26 43.82 101.26 97.68-45.42 97.68-101.26 97.68zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.94 96.63 100.18 96.63 100.18-43.35 100.18-96.63-44.94-96.63-100.18-96.63z"/>
    <path d="M420.8 336.09c-55.84 0-101.26-43.82-101.26-97.68S365 140.74 420.8 140.74s101.26 43.82 101.26 97.68-45.42 97.67-101.26 97.67zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63S365.56 335 420.8 335 521 291.7 521 238.42s-45-96.63-100.2-96.63z"/>
    <path d="M420 335.57c-55.84 0-101.26-43.82-101.26-97.68s45.41-97.67 101.26-97.67S521.25 184 521.25 237.89 475.82 335.57 420 335.57zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.93 96.63 100.18 96.63 100.18-43.35 100.18-96.63-45-96.63-100.18-96.63z"/>
    <path d="M419.17 335c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68 101.26 43.82 101.26 97.68S475 335 419.17 335zm0-194.31C363.93 140.69 319 184 319 237.32S363.93 334 419.17 334s100.18-43.35 100.18-96.63-44.94-96.63-100.18-96.63z"/>
    <path d="M418.36 334.52c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68S519.62 183 519.62 236.84s-45.43 97.68-101.26 97.68zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.94 96.63 100.18 96.63 100.18-43.35 100.18-96.63-44.95-96.62-100.18-96.62z"/>
    <path d="M417.54 334c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68 101.26 43.82 101.26 97.68S473.38 334 417.54 334zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63S362.31 333 417.54 333s100.18-43.35 100.18-96.63-44.94-96.68-100.18-96.68z"/>
    <path d="M416.73 333.47c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68S518 181.94 518 235.8s-45.44 97.67-101.27 97.67zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.94 96.63 100.18 96.63S516.9 289.08 516.9 235.8s-44.9-96.63-100.17-96.63z"/>
    <path d="M415.91 333c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68 101.26 43.82 101.26 97.68S471.75 333 415.91 333zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63S360.67 332 415.91 332s100.18-43.35 100.18-96.63-44.94-96.68-100.18-96.68z"/>
    <path d="M415.1 332.43c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68 101.26 43.82 101.26 97.68-45.42 97.68-101.26 97.68zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.94 96.63 100.18 96.63S515.28 288 515.28 234.75s-44.94-96.63-100.18-96.63z"/>
    <path d="M414.28 331.9c-55.83 0-101.28-43.82-101.28-97.67s45.43-97.68 101.26-97.68 101.26 43.82 101.26 97.68-45.4 97.67-101.24 97.67zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.9 96.64 100.18 96.64 100.18-43.35 100.18-96.63-44.94-96.63-100.18-96.63z"/>
    <path d="M413.47 331.38c-55.84 0-101.26-43.82-101.26-97.68S357.63 136 413.47 136s101.26 43.82 101.26 97.68-45.42 97.7-101.26 97.7zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.94 96.63 100.18 96.63S513.65 287 513.65 233.7s-44.94-96.63-100.18-96.63z"/>
    <path d="M412.66 330.86c-55.84 0-101.26-43.82-101.26-97.68s45.43-97.68 101.26-97.68 101.26 43.82 101.26 97.68-45.43 97.68-101.26 97.68zm0-194.31c-55.24 0-100.18 43.35-100.18 96.63s44.94 96.63 100.18 96.63 100.18-43.35 100.18-96.63-45-96.63-100.18-96.63z"/>
  </g>
  <circle cx="417.25" cy="236.92" r="96.89" fill="#ebdcb2"/>
  <path d="M417.25 334.85a97.93 97.93 0 1 1 97.93-97.93 98 98 0 0 1-97.93 97.93zm0-193.78a95.84 95.84 0 1 0 95.84 95.84 96 96 0 0 0-95.84-95.83z" fill="#4d4d4d"/>
  <path d="M434.3 237.72a.92.92 0 0 1-1-.72c-.29-.93.56-1.29 1.12-1.48 3.93-2.52 9.37-6.93 9.37-9a5.55 5.55 0 0 0-.08-1 1 1 0 0 1-1.48-.11.9.9 0 0 1-.2-.34l-.91-2.72a1 1 0 0 1 0-.54l.25-1.26-7.15-1.55a1 1 0 0 1-.37-.16l-5.85-4.15a1 1 0 0 1-.35-1.37 1.07 1.07 0 0 1 .41-.38c.16-.1 4.1-2.62 4.93-10.09 0-.09.77-5.75-2-8.45-1.29-1.26-3.23-1.69-5.76-1.29l-9.87 3.59a1 1 0 0 1-1.33-.47 1 1 0 0 1 0-.78l3.49-13.09c-1.72-2.25-8.43-11.2-9.71-15l-12.35-7.94a1 1 0 0 1-.37-.41l-3.62-7.24a1 1 0 0 1 .35-1.37 1 1 0 0 1 .58-.14h1.53l6.1-3.48a1 1 0 0 1 .42-.13c1-.09 10.26-.9 13.1 0l2.51.83c2.22-.19 18.66-1.38 25 5.71l9 6.27a1.1 1.1 0 0 1 .22.21c.41.52 10.11 12.94 13.75 23.86v.17c.09.6 2.2 14.93-4 24.68l-6.87 10.27-.87 6.1a.54.54 0 0 1 0 .18l-2.72 8.15a1 1 0 0 1-.74.68s-3.68.92-9.93 2.71c-1.71.49-2.76.78-3.39.94a4.82 4.82 0 0 1-1.21.31zm9.7-14.52a1.67 1.67 0 0 1 .62.12c1.18.49 1.32 2.05 1.32 3.18 0 2.33-3 5.26-5.79 7.52 3.85-1.08 6.47-1.77 7.56-2l2.51-7.52.89-6.25a1 1 0 0 1 .17-.43l7-10.45c5.55-8.7 3.89-22 3.72-23.14-3.36-10-12.28-21.71-13.29-23l-8.93-6.23a1.54 1.54 0 0 1-.19-.17c-5.91-6.75-23.38-5.1-23.56-5.08a1 1 0 0 1-.43 0l-2.72-.9c-2-.67-9.15-.22-12 0l-6.14 3.51a1.07 1.07 0 0 1-.52.14H394l2.74 5.48 12.44 8a1 1 0 0 1 .45.63c.7 2.8 7.29 11.78 9.77 15a1 1 0 0 1 .18.91l-3.11 11.65 8.08-2.94h.19c3.28-.55 5.85.07 7.66 1.84 3.52 3.44 2.64 9.93 2.6 10.2-.66 6-3.19 9.2-4.73 10.65l4.57 3.16 8 1.77a1 1 0 0 1 .82 1.16v.07l-.4 2 .44 1.31zM402.63 261.52c-2.57-18-26.87-19.91-27.11-19.93a1.09 1.09 0 0 1-.26-.05l-5.43-1.81a1 1 0 0 1-.66-.66c-1.69-5.08.94-13.51 1.66-15.61-1.71-3.21-2.52-10.88-2.61-11.78a1 1 0 0 1 .53-1c1.41-.79 2.65-1.48 3.76-2.07a16.49 16.49 0 0 1-2.95-1.6 5.06 5.06 0 0 1-2.2-5.71 1.11 1.11 0 0 1 .22-.38l10-10.87c1.08-1.08.22-3.49-.16-4.26l-2.68-4.46a1 1 0 0 1-.15-.54V179a1 1 0 0 1 .31-.75l3.82-3.74c4.92-9.32 14-16 14.4-16.28l1.23 1.69c-.09.07-9.19 6.76-13.86 15.71a1 1 0 0 1-.2.26l-3.63 3.54v1.08l2.57 4.28c.13.25 2.16 4.39-.16 6.71l-9.75 10.64a3 3 0 0 0 1.45 3.14 14 14 0 0 0 4.35 2c5.56-2.83 6-2.29 6.43-1.69.68.9-.25 1.84-.65 2.24a6.11 6.11 0 0 1-5.41 1.64c-1.6.82-3.39 1.78-5.08 2.72.33 2.84 1.22 8.74 2.47 10.62a1 1 0 0 1 .11.94c0 .09-3.26 9.09-1.94 14.22l4.8 1.6c2.07.19 26.19 2.83 28.89 21.71z" fill="#4d4d4d"/>
  <path d="M391.93 194.94c-3.48-5.22-16.82-15-17-15.13l1.24-1.69c.56.41 13.77 10.13 17.46 15.66z" fill="#4d4d4d"/>
  <path d="M385.3 204.43a4.65 4.65 0 0 1-3.17-2.15 3.69 3.69 0 0 1-.29-2.82 1 1 0 0 1 .55-.62 20.31 20.31 0 0 0 1.22-4.65 1 1 0 0 1 .25-.53 12.91 12.91 0 0 0-1-1.39c-1.32-1.76-1.71-3.11-1.2-4.13a2.27 2.27 0 0 1 2-1.16v2.09a.54.54 0 0 0-.21.05 4.77 4.77 0 0 0 1 1.9c1.5 2 2.14 3.18 1.42 4a1.21 1.21 0 0 1-.47.34c-.59 3.19-1.21 4.51-1.74 5a1.59 1.59 0 0 0 .19.83 2.79 2.79 0 0 0 1.83 1.11zm-2.46-5.68z" fill="#4d4d4d"/>
  <path d="M384.9 195.37l-.51-2 .49-.12-1.53-.61.78-1.94 4.53 1.81a1 1 0 0 1-.13 2zM417.63 221.75a2.55 2.55 0 0 1-1.34-.39c-2-1.25-2.68-5.24-2.79-6l2.07-.3c.22 1.56.94 4 1.82 4.55a.44.44 0 0 0 .35.07l10.75-6.27 1.05 1.8-10.87 6.34-.2.09a2.66 2.66 0 0 1-.84.11z" fill="#4d4d4d"/>
  <path transform="rotate(-26.57 390.09 199.754)" fill="#4d4d4d" d="M388.06 198.71h4.05v2.09h-4.05z"/>
  <path d="M379.19 203.88c-.37-.74-2.36-.6-3.34-.36l-.5-2c.45-.12 4.47-1 5.72 1.45zM434.2 161.87a144.05 144.05 0 0 0-15.14-2.68h-23.54v-2.09h23.54c2 0 12.2 1.88 15.65 2.75zM382.36 216.11c-.91-1.82-3.29-7.42-3.39-7.66l1.92-.82c0 .06 2.45 5.78 3.33 7.54zM375.14 229.36a1 1 0 0 1-1-1v-3.86a1 1 0 0 1-1.81-.71v-3.19l-2.32.58-.51-2 3.62-.91a1 1 0 0 1 1.25.65.83.83 0 0 1 .05.35v1.1a1 1 0 0 1 1.81.71v3.47l.78-1.29 1.79 1.08-2.8 4.52a1 1 0 0 1-.86.5zM380.12 239.78a1 1 0 0 1-1-1l-3.2.92a1 1 0 0 1-.72-.06l-5.72-2.64.87-1.9 5.37 2.47 6-1.7a1 1 0 0 1 1.19.48.79.79 0 0 1 .12.3l10.42-3.47a1 1 0 0 1 .8.06l1.34.67c2.33-1.17 4.77-2.44 6.21-3.25v-.18a1 1 0 0 1 1-1h.91a1.07 1.07 0 0 1 .43.09c1.63 0 4.44-.17 4.9-2 .77-3.07 4.07-2.54 6-2.23a7.26 7.26 0 0 0 1.54.16.58.58 0 0 0-.37.51h2.09a1.49 1.49 0 0 1-.52 1.17c-.71.6-1.75.44-3.07.23-2.34-.37-3.43-.36-3.69.67-.82 3.29-4.81 3.66-7 3.6a78.22 78.22 0 0 1-8 4.31 1 1 0 0 1-.93 0l-1.42-.71-13.17 4.39a.88.88 0 0 1-.38.11zM415.9 209.78l-.93-1.87c2.45-1.23 4.77-2.95 4.86-3.6 0-1.22-.44-1.66-1.67-1.66v-2.09a3.42 3.42 0 0 1 3.76 3 2.89 2.89 0 0 1 0 .72c0 2.26-4.21 4.6-6.02 5.5z" fill="#4d4d4d"/>
  <path d="M419.06 212.61v-2.09a33.88 33.88 0 0 0 6.35-1.57c.77-3.85 0-4.74-.13-4.88a.68.68 0 0 0-.57-.09 1.06 1.06 0 0 1-1-.16 3.52 3.52 0 0 1-1.45-2.66 5.83 5.83 0 0 1 1.24-3.47c-2.93-.79-3.13-1.4-3-2.14.14-1.24 1.62-1.33 4-1.33 8.19 0 8.29 4.48 8.29 4.67h-2c0-.78-1.09-2.18-4.51-2.53a1 1 0 0 1 0 1.41c-.48.45-1.83 2-1.77 3.23a1.28 1.28 0 0 0 .33.81 2.65 2.65 0 0 1 2 .62c1.32 1.15 1.54 3.6.67 7.49a1 1 0 0 1-.69.76c-.76.26-5.82 1.93-7.76 1.93zM371.41 323l-.69-2 61.16-21.27-12.77-17.83a1 1 0 0 1 1.09-1.62l18.12 4.31c6.08-15.67 20.7-32.36 23.46-35.43-.82-1.71-4.09-6-6.41-8.86a60.22 60.22 0 0 1-5.59-10.21l1.92-.82A59.89 59.89 0 0 0 457 239c1.06 1.29 6.5 8 7 10.16a1 1 0 0 1-.25.93c-.18.19-17.6 19.27-23.79 36.07a1 1 0 0 1-1.22.65l-16.3-3.81 12 16.75a1 1 0 0 1-.15 1.41 1.22 1.22 0 0 1-.36.18zM389.18 223.48a1 1 0 0 1-.74-.31l-6.34-6.34 1.48-1.48 6 6a32.49 32.49 0 0 0 4.72-1.53c-.23-1.07 1-1.91 2.5-2.81 3.46-2.08 6.89-9.55 7.92-12.25a1 1 0 0 1 1.26-.64h.12l.25-.41c2.7-4.5 6.33-9.95 6.37-10l1.74 1.16c0 .05-3.64 5.46-6.31 9.92-.93 1.55-1.61 2.61-2.4 2.75-1.43 3.2-4.42 9.09-7.92 11.19a1 1 0 0 1 .49 1.33 1 1 0 0 1-.6.53c-1.07.55-6.61 2.89-8.54 2.89z" fill="#4d4d4d"/>
  <path d="M369.26 322.18a1 1 0 0 1-1.09-.9.93.93 0 0 1 .09-.52l17.81-46.3-2-1.35a1 1 0 0 1-.34-1.37.35.35 0 0 1 0-.08l3.62-5.43a1 1 0 0 1 .87-.47h8.63l6.42-6.27 1.46 1.5-6.73 6.56a1 1 0 0 1-.73.3h-8.5l-2.73 4.1 1.85 1.23a1 1 0 0 1 .4 1.24l-14.16 36.81c10.63-15.56 26.3-32.29 38.59-44.49 16-15.92 29.91-27.78 30.05-27.9l.1-.07c2-1.33 4.31-6.62 5-8.55l2 .73c-.29.77-2.89 7.53-5.78 9.52-1.81 1.55-55.49 47.73-74 81.17a1 1 0 0 1-.83.54z" fill="#4d4d4d"/>
  <path d="M406 276.77h-.08a1 1 0 0 1-.84-.56l-3.24-6.21 1.85-1 2.49 4.75 2.57-3.42-2-3.34-6.57.82-.26-2.07 7.24-.91a1 1 0 0 1 1 .5l2.72 4.53a1 1 0 0 1-.06 1.16l-4 5.3a1 1 0 0 1-.82.45zM378.31 309l-1.8-1.05L395 276.29l-.47-.23-3.25.81a1.06 1.06 0 0 1-.61 0l-5-1.83.72-2 4.68 1.72 3.31-.83a1 1 0 0 1 .72.08l1.81.91a1 1 0 0 1 .44 1.46zM422.37 213.54h-.74l.29-2.07c.22 0 5.44.65 7-5.56l2 .51c-1.61 6.48-6.64 7.12-8.55 7.12zM499.87 285.66c-10.37-18.32-38.14-34.06-38.42-34.22l1-1.82c1.16.65 28.55 16.19 39.21 35zM447.21 329.49l-2.08-.15c.73-10 4.81-13.92 6.36-15.08-.64-11.83 6.17-27.3 6.47-28l1.91.85c-.07.16-7.13 16.2-6.25 27.57a1 1 0 0 1-.55 1s-5.07 2.99-5.86 13.81z" fill="#4d4d4d"/>
  <path d="M460.88 296a1.39 1.39 0 0 1-.63-.15l.93-1.87a.59.59 0 0 0-.37-.07 24.6 24.6 0 0 0 3.86-2.79c5.95-4.74 17-13.55 29.55-13.55v2.09c-11.8 0-22.5 8.52-28.25 13.1-2.75 2.14-4.08 3.24-5.09 3.24zM457.19 307.62l-1.19-1.73 9.54-6.45a1.07 1.07 0 0 1 .87-.14l12.68 3.62-.57 2-12.21-3.49zM397.21 249.44l-1.08-1.79a3.62 3.62 0 0 0 1-1.68c.63-1.58 1.59-3.95 5.15-3.34h.15l-4.1-1.54a1 1 0 0 1-.1-1.91l3.24-1.62.77-2.31a1 1 0 0 1 .66-.66l4.85-1.62.85-4.66 2 .38-1 5.27a1 1 0 0 1-.7.8l-4.9 1.63-.74 2.22a1 1 0 0 1-.52.6l-1.48.74 5 1.88a1 1 0 1 1-.11 2l-3.62.9a.9.9 0 0 1-.46 0c-2.06-.41-2.4.45-3 2a5.05 5.05 0 0 1-1.86 2.71zM336.66 264.22a1 1 0 0 1-.74-.31l-7.27-7.27v5.63h-2.09v-8.15a1 1 0 0 1 1.78-.74l7.27 7.27v-7.44h2.09v10a1 1 0 0 1-1 1zM345.85 264.22a6.48 6.48 0 1 1 6.48-6.48 6.48 6.48 0 0 1-6.48 6.48zm0-10.87a4.39 4.39 0 1 0 4.39 4.39 4.4 4.4 0 0 0-4.39-4.39zM357.7 263.59a13.38 13.38 0 0 1-2.75-.29 1 1 0 0 1-.81-1v-10a1 1 0 0 1 .94-1c4.86-.48 7.41-.07 8.27 1.35a2 2 0 0 1 .11 1.77 3.69 3.69 0 0 1-2 2.7 3.31 3.31 0 0 1 1.21.92 2.78 2.78 0 0 1 .49 2.56c-.85 2.46-3.42 2.99-5.46 2.99zm-1.47-2.2c1.43.18 4.33.32 5-1.49a.66.66 0 0 0-.14-.59c-.21-.24-1.16-1-4.81-.53zm0-8.12v3.4c2.25-.37 5.15-1.41 5.15-2.54a.79.79 0 0 1 .1-.48c-.27-.19-1.4-.65-5.25-.38zM370.86 264.22h-4.53a1 1 0 0 1-1-1v-10.91a1 1 0 0 1 1-1h5.43v2.09h-4.39v8.78h3.48z" fill="#4d4d4d"/>
  <path transform="rotate(-80.89 368.723 257.38)" fill="#4d4d4d" d="M367.68 255.25h2.09v4.27h-2.09z"/>
  <path d="M380.82 264.22h-5.43a1 1 0 0 1-1-1v-11.81h2.09v10.73h4.39zM342 248.25l-3.68-5.15-3.68 5.15L333 247l4.53-6.34a1.08 1.08 0 0 1 1.52-.18 1 1 0 0 1 .18.18l4.53 6.34z" fill="#4d4d4d"/>
  <path transform="rotate(-89.67 338.115 244.962)" fill="#4d4d4d" d="M337.07 242.47h2.09v4.99h-2.09z"/>
  <path d="M350.24 247.65h-4.53a1 1 0 0 1-1-1v-6.34h2.09v5.29h3.48zM354.14 247.65h-2.09v-7.25a1 1 0 0 1 1-1h3.62v2.09h-2.58z" fill="#4d4d4d"/>
  <path fill="#4d4d4d" d="M353.04 243.07h2.77v2.09h-2.77zM366.82 250.5c-2.94 0-5.42-4.21-6.2-5.68v2.83h-2.09v-7.25a1 1 0 0 1 1-1c.53 0 3.2.08 4.32 1.63a2.47 2.47 0 0 1 .44 1.86v.16c.13.8-.44 1.2-1.47 1.6 1.1 1.83 2.73 3.81 3.92 3.81zm-6.2-9v1.77a1 1 0 0 1 .44-.28 11.82 11.82 0 0 0 1.2-.43.47.47 0 0 0-.06-.4 2.7 2.7 0 0 0-1.58-.61z"/>
  <circle cx="366.23" cy="244.48" r=".91" fill="#4d4d4d"/>
  <path d="M451.26 145.2a54.35 54.35 0 0 1 19.15 7.8s21.36 12 30.76 25.08l-8.17-1.21a126.08 126.08 0 0 0-41.76-31.68zM172.66 114.1l-20.44-21.56v20.94h-5.57v-33.1l.89-.18 20.18 21.24V80.82h5.57V114zM196.76 114c-9.44 0-16.35-7.17-16.35-16.84s7.22-16.88 16.66-16.88 16.35 7.17 16.35 16.88A16.39 16.39 0 0 1 197.51 114zm.18-28.73c-6.24 0-10.56 5.08-10.56 11.89s4.32 11.89 10.56 11.89 10.51-5.12 10.51-11.89-4.32-11.88-10.51-11.88zM229.37 113.78a74.4 74.4 0 0 1-8.82-.62v-32a63.32 63.32 0 0 1 8.37-.62c8.6 0 12.83 4.19 12.83 8.55 0 3.43-1.6 5.92-5.7 7.44 4.77 1.34 6.59 4.23 6.59 7.84 0 4.87-4.49 9.41-13.27 9.41zm.53-28.42a25.17 25.17 0 0 0-3.88.31v9c1.1.1 2.2.14 3.3.13 4.68 0 6.68-2 6.68-4.8s-2-4.63-6.09-4.63zm-.49 13.45A24.38 24.38 0 0 0 226 99v9.8a33.4 33.4 0 0 0 4 .22c4.46 0 6.68-2.09 6.68-5.17 0-2.8-2.47-5-7.28-5zM249.1 113.47V80.82H269v5.08h-14.33v8.55h13v4.9h-13v9H269v5.08zM276.68 113.47V80.82h5.57v27.57h14.34v5.08zM321.58 103c-1.07 0-2.18-.09-3.25-.13v10.65h-5.57V81.13a68.8 68.8 0 0 1 8.24-.53c9 0 13.54 4.9 13.54 11 .05 6.64-4.63 11.4-12.96 11.4zm.4-17.24a24.81 24.81 0 0 0-3.65.27v11.9c1.11.09 2.14.18 3.12.18 5 0 7.35-2.63 7.35-6.33 0-3.21-2.27-6.06-6.8-6.06zM358.29 113.47l-7.13-11.76h-1.74c-1.07 0-2.18 0-3.25-.09v11.8h-5.57V81.13a70.66 70.66 0 0 1 8.6-.53c9.26 0 13.36 4.5 13.36 10.29a10 10 0 0 1-6.37 9.44l8.55 13.14zm-8.37-27.88a19.57 19.57 0 0 0-3.74.27V97a24.68 24.68 0 0 0 3.21.18c4.85 0 7.3-2.27 7.3-6 0-3.32-2.5-5.59-6.78-5.59zM370.09 113.47V80.82h5.57v32.65zM390.85 108.39h16.93v5.08h-25.66l-.22-.67 17.33-26.9h-16.17v-5.08H408l.22.67zM414.2 113.47V80.82h19.91v5.08h-14.35v8.55h13v4.9h-13v9h14.34v5.08zM449.57 114a19.26 19.26 0 0 1-10.24-3.21l1.92-5a15.14 15.14 0 0 0 8.51 3c3.43 0 4.95-2 4.95-4.28s-1-3.7-6.15-5.88c-5.7-2.41-7.75-5.35-7.75-9.26 0-4.72 3.92-9.13 10.74-9.13a15.45 15.45 0 0 1 8.2 2.36L458 87.5a12.65 12.65 0 0 0-6.55-2.32c-3.43 0-5 1.87-5 4s1.6 3.48 5.66 5.26c6.46 2.81 8.33 5.44 8.33 9.71-.09 5.36-4.15 9.85-10.87 9.85zM170.06 178l-3-6.9H156l-3 6.9h-2.82l11.19-25.36h.44L173 178zm-8.53-19.89l-4.59 10.71h9.18zM187.7 178.37h-.44l-4.35-9.69-4.42 9.69H178l-5.13-14.65h3l2.83 9.28 3.94-9.38h.44l4.22 9.38 2.62-9.31h2.86zM203.28 178v-1.5a6.19 6.19 0 0 1-4.42 1.77c-2.82 0-5.17-1.67-5.17-4.59 0-2.58 2.21-4.45 5.13-4.45a9.81 9.81 0 0 1 4.32 1v-.85c0-2.41-1.12-3.54-3.74-3.54a10.18 10.18 0 0 0-3.74.71l-.44-2.31a16.58 16.58 0 0 1 4.52-.75c4.08 0 6 1.94 6 6V178zm-.14-5.58a7 7 0 0 0-3.88-1.16c-1.84 0-3 .82-3 2.41s1.19 2.45 3.3 2.45a4.76 4.76 0 0 0 3.6-1.77zM212 168.24V178h-2.7v-14.28h2.55v2.38a6.42 6.42 0 0 1 5.1-2.65v2.62a5.9 5.9 0 0 0-4.95 2.17zM230 178v-1.46a6.23 6.23 0 0 1-4.56 1.73c-4.11 0-7-3-7-7.27a7.37 7.37 0 0 1 7-7.55 6.59 6.59 0 0 1 4.35 1.43v-11.8h2.69V178zm-.14-10.37a5.26 5.26 0 0 0-4.15-1.94c-2.69 0-4.59 2.18-4.59 5.24 0 2.86 1.77 5.1 4.76 5.1a5 5 0 0 0 4-1.87zM248.9 171.68h-10.47c.31 2.45 1.67 4.28 5.34 4.28a13.26 13.26 0 0 0 3.94-.78l.48 2.28a18 18 0 0 1-4.66.82c-5.13 0-7.72-3.23-7.72-7.34 0-3.91 2.52-7.48 6.94-7.48 4 0 6.26 3 6.26 6.87a6.1 6.1 0 0 1-.11 1.35zm-2.38-2c-.17-2.21-1.43-3.94-3.94-3.94-2.31 0-3.74 1.5-4 3.94zM263 178v-1.46a6.23 6.23 0 0 1-4.56 1.73c-4.11 0-7-3-7-7.27a7.37 7.37 0 0 1 7-7.55 6.59 6.59 0 0 1 4.35 1.43v-11.8h2.69V178zm-.14-10.37a5.26 5.26 0 0 0-4.15-1.94c-2.69 0-4.59 2.18-4.59 5.24 0 2.86 1.77 5.1 4.76 5.1a5 5 0 0 0 4-1.87zM280.49 166v8c0 1.33.75 1.87 2.24 1.87a7.85 7.85 0 0 0 1.19-.1l.27 2.18a11.6 11.6 0 0 1-2.35.27c-2.58 0-4-1.36-4-4.49V166h-2.28v-.34l2.28-2.21V161l2.62-1.94v4.66h4.22V166zM293.75 178.27a7.41 7.41 0 1 1 7.21-7.61v.2a7.11 7.11 0 0 1-6.82 7.4zm0-12.65c-2.75 0-4.59 2.11-4.59 5.24s1.84 5.24 4.59 5.24 4.56-2.11 4.56-5.24-1.84-5.23-4.56-5.23zM160.71 213v-1.5a6.19 6.19 0 0 1-4.42 1.77c-2.82 0-5.17-1.67-5.17-4.59 0-2.58 2.21-4.45 5.13-4.45a9.81 9.81 0 0 1 4.32 1v-.85c0-2.41-1.12-3.54-3.74-3.54a10.18 10.18 0 0 0-3.74.71l-.44-2.31a16.58 16.58 0 0 1 4.52-.75c4.08 0 6 1.94 6 6V213zm-.14-5.58a7 7 0 0 0-3.88-1.16c-1.84 0-3 .82-3 2.41s1.19 2.45 3.3 2.45a4.76 4.76 0 0 0 3.6-1.77zM166.86 213v-24.92h2.69V213zM183.42 213v-2a8 8 0 0 1-5.13 2.28c-3.33 0-4.93-2-4.93-4.86v-9.69H176v9c0 2.21 1 3.33 3 3.33a6.27 6.27 0 0 0 4.25-2.18v-10.16H186V213zM208.92 213v-9.15c0-2-.71-3.09-2.58-3.09a6.11 6.11 0 0 0-4.28 2.28v10h-2.69v-9c0-2.21-.65-3.33-2.69-3.33a5.75 5.75 0 0 0-4.22 2.41V213h-2.69v-14.28h2.55v2.18a7.73 7.73 0 0 1 5.27-2.45 3.77 3.77 0 0 1 3.88 2.65 7.53 7.53 0 0 1 5.68-2.58c3 0 4.45 1.84 4.45 4.86V213zM225.21 213v-9c0-2.21-.82-3.33-2.89-3.33A6.49 6.49 0 0 0 218 203v10h-2.69v-14.28h2.55v2.18a7.64 7.64 0 0 1 5.27-2.45c3.3 0 4.79 2 4.79 4.86V213zM233.09 195.49a1.72 1.72 0 1 1 1.7-1.74 1.71 1.71 0 0 1-1.7 1.74zM231.73 213v-14.28h2.69V213zM254.85 213v-1.5a6.19 6.19 0 0 1-4.42 1.77c-2.82 0-5.17-1.67-5.17-4.59 0-2.58 2.21-4.45 5.13-4.45a9.81 9.81 0 0 1 4.32 1v-.85c0-2.41-1.12-3.54-3.74-3.54a10.18 10.18 0 0 0-3.74.71l-.44-2.31a16.58 16.58 0 0 1 4.52-.75c4.08 0 6 1.94 6 6V213zm-.14-5.58a7 7 0 0 0-3.88-1.16c-1.84 0-3 .82-3 2.41s1.19 2.45 3.3 2.45a4.76 4.76 0 0 0 3.6-1.77zM270.8 213v-9c0-2.21-.82-3.33-2.89-3.33a6.5 6.5 0 0 0-4.35 2.31v10h-2.69v-14.26h2.55v2.18a7.64 7.64 0 0 1 5.27-2.45c3.3 0 4.79 2 4.79 4.86V213zM288.14 213v-1.46a6.23 6.23 0 0 1-4.56 1.73c-4.11 0-7-3-7-7.27a7.37 7.37 0 0 1 7-7.55 6.59 6.59 0 0 1 4.35 1.43v-11.8h2.69V213zm-.14-10.37a5.26 5.26 0 0 0-4.15-1.94c-2.69 0-4.59 2.18-4.59 5.24 0 2.86 1.77 5.1 4.76 5.1a5 5 0 0 0 4-1.87zM158.74 248.27a8.48 8.48 0 0 1-4.15-1.05v8.13h-2.69v-21.63h2.55v1.43a7.06 7.06 0 0 1 4.79-1.7c3.77 0 6.73 3 6.73 7.31a7.2 7.2 0 0 1-6.9 7.5zm0-12.58a5.6 5.6 0 0 0-4.18 1.7v7a5.49 5.49 0 0 0 4.11 1.63c2.75 0 4.66-2.21 4.66-5.27 0-2.75-1.77-5.06-4.59-5.06zM177.88 248v-1.5a6.19 6.19 0 0 1-4.42 1.77c-2.82 0-5.17-1.67-5.17-4.59 0-2.58 2.21-4.45 5.13-4.45a9.81 9.81 0 0 1 4.32 1v-.85c0-2.41-1.12-3.54-3.74-3.54a10.18 10.18 0 0 0-3.74.71l-.44-2.31a16.58 16.58 0 0 1 4.52-.75c4.08 0 6 1.94 6 6V248zm-.14-5.58a7 7 0 0 0-3.88-1.16c-1.84 0-3 .82-3 2.41s1.19 2.45 3.3 2.45a4.76 4.76 0 0 0 3.6-1.77zM188 248.27a8 8 0 0 1-5.1-1.87l1.36-1.9a5.86 5.86 0 0 0 3.6 1.6c1.67 0 2.45-.78 2.45-2 0-2.79-6.66-2.07-6.66-6.36 0-2.24 1.84-4.25 4.86-4.25a8 8 0 0 1 4.15 1.36l-1.19 2a5.36 5.36 0 0 0-3.06-1.19c-1.63 0-2.31.82-2.31 1.84 0 2.41 6.63 1.9 6.63 6.32a4.56 4.56 0 0 1-4.67 4.45zM199.27 236v8c0 1.33.75 1.87 2.24 1.87a7.85 7.85 0 0 0 1.19-.1l.3 2.23a11.6 11.6 0 0 1-2.35.27c-2.58 0-4-1.36-4-4.49V236h-2.28v-.34l2.28-2.21V231l2.62-1.94v4.66h4.22V236zM222 225.46a6 6 0 0 0-1.33-.17c-2.52 0-3.4 1.05-3.4 4v4.39h4.22V236h-4.22v12h-2.65v-12h-2.21v-.34l2.21-2.21v-3.77c0-4.42 1.84-6.87 5.61-6.87a6.87 6.87 0 0 1 2.21.31zM232 248v-1.5a6.19 6.19 0 0 1-4.42 1.77c-2.82 0-5.17-1.67-5.17-4.59 0-2.58 2.21-4.45 5.13-4.45a9.81 9.81 0 0 1 4.32 1v-.85c0-2.41-1.12-3.54-3.74-3.54a10.18 10.18 0 0 0-3.74.71l-.44-2.31a16.58 16.58 0 0 1 4.52-.75c4.08 0 6 1.94 6 6V248zm-.14-5.58a7 7 0 0 0-3.88-1.16c-1.84 0-3 .82-3 2.41s1.19 2.45 3.3 2.45a4.76 4.76 0 0 0 3.6-1.77zM245.16 248.27a7.34 7.34 0 0 1-7.71-7v-.39a7.44 7.44 0 0 1 7.42-7.48h.3a9.53 9.53 0 0 1 4.86 1.46l-1.09 2a8.05 8.05 0 0 0-4-1.19c-2.79 0-4.9 1.9-4.9 5.17a5 5 0 0 0 5 5h.07a8.05 8.05 0 0 0 4-1.19l.92 2a9.49 9.49 0 0 1-4.87 1.62zM262.47 248v-2a8 8 0 0 1-5.13 2.28c-3.33 0-4.93-2-4.93-4.86v-9.69h2.69v9c0 2.21 1 3.33 3 3.33a6.27 6.27 0 0 0 4.25-2.18v-10.16H265V248zM269 248v-24.92h2.69V248zM279.06 236v8c0 1.33.75 1.87 2.24 1.87a7.85 7.85 0 0 0 1.19-.1l.27 2.18a11.6 11.6 0 0 1-2.35.27c-2.58 0-4-1.36-4-4.49V236h-2.28v-.34l2.28-2.21V231l2.62-1.94v4.66h4.22V236zM288.62 255.34h-2.69l4.28-8.7-6-12.92h3l4.33 10.28 4.28-10.23h2.89zM171 283v-9.15c0-2-.71-3.09-2.58-3.09a6.11 6.11 0 0 0-4.28 2.28v10h-2.69v-9c0-2.21-.65-3.33-2.69-3.33a5.75 5.75 0 0 0-4.22 2.41V283h-2.64v-14.28h2.55v2.18a7.73 7.73 0 0 1 5.27-2.45 3.77 3.77 0 0 1 3.88 2.65 7.53 7.53 0 0 1 5.68-2.58c3 0 4.45 1.84 4.45 4.86V283zM190 276.68h-10.52c.31 2.45 1.67 4.28 5.34 4.28a13.26 13.26 0 0 0 3.94-.78l.48 2.28a18 18 0 0 1-4.66.82c-5.13 0-7.72-3.23-7.72-7.34 0-3.91 2.52-7.48 6.94-7.48 4 0 6.26 3 6.26 6.87a6.1 6.1 0 0 1-.06 1.35zm-2.38-2c-.17-2.21-1.43-3.94-3.94-3.94-2.31 0-3.74 1.5-4 3.94zM212.22 283v-9.15c0-2-.71-3.09-2.58-3.09a6.11 6.11 0 0 0-4.28 2.28v10h-2.69v-9c0-2.21-.65-3.33-2.69-3.33a5.75 5.75 0 0 0-4.22 2.41V283h-2.69v-14.28h2.55v2.18a7.73 7.73 0 0 1 5.27-2.45 3.77 3.77 0 0 1 3.88 2.65 7.53 7.53 0 0 1 5.68-2.58c3 0 4.45 1.84 4.45 4.86V283zM225.61 283.27a6.86 6.86 0 0 1-4.49-1.67v1.4h-2.55v-24.92h2.69V270a7.48 7.48 0 0 1 4.66-1.56c3.81 0 6.73 3 6.73 7.31a7.34 7.34 0 0 1-7.04 7.52zm-.2-12.58a5.54 5.54 0 0 0-4.15 1.7v6.77a5.06 5.06 0 0 0 3.84 1.84c2.86 0 4.9-2.18 4.9-5.24 0-2.76-1.73-5.07-4.59-5.07zM248.46 276.68H238c.31 2.45 1.67 4.28 5.34 4.28a13.26 13.26 0 0 0 3.94-.78l.48 2.28a18 18 0 0 1-4.66.82c-5.13 0-7.72-3.23-7.72-7.34 0-3.91 2.52-7.48 6.94-7.48 4 0 6.26 3 6.26 6.87a6.11 6.11 0 0 1-.12 1.35zm-2.38-2c-.17-2.21-1.43-3.94-3.94-3.94-2.31 0-3.74 1.5-4 3.94zM254.28 273.24V283h-2.69v-14.28h2.55v2.38a6.42 6.42 0 0 1 5.1-2.65v2.62a5.92 5.92 0 0 0-4.96 2.17zM265.77 283.27a8 8 0 0 1-5.1-1.87l1.36-1.9a5.86 5.86 0 0 0 3.6 1.6c1.67 0 2.45-.78 2.45-2 0-2.79-6.66-2.07-6.66-6.36 0-2.24 1.84-4.25 4.86-4.25a8 8 0 0 1 4.15 1.36l-1.19 2a5.36 5.36 0 0 0-3.06-1.19c-1.63 0-2.31.82-2.31 1.84 0 2.41 6.63 1.9 6.63 6.32a4.56 4.56 0 0 1-4.67 4.45z" fill="#4d4d4d"/>
</svg>
                                    </div>

                                </div>
                            </div>

                            <div class="outreachCol">
                                <h2>Outreach</h2>

                                <div class="col_inner">

                                    <div class="rs_svgs">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 380">
  <path d="M255.24 190.88c-8.19 0-14-5.65-14-13.35s5.83-13.38 14-13.38a16.22 16.22 0 0 1 8.33 2.37l-1.52 3.74a14.64 14.64 0 0 0-6.88-2c-5.68 0-9.14 3.78-9.14 9.25s3.57 9.22 9.25 9.22a14.77 14.77 0 0 0 7.06-2l1.34 3.74a16.15 16.15 0 0 1-8.44 2.41zM284.44 190.46l-2.51-5.93h-10.24l-2.51 5.93h-4.55l11.93-26.23h.64l11.9 26.23zm-7.63-18.08l-3.67 8.62h7.34zM291.82 190.46v-25.88h4.41v21.86h11.37v4zM317.24 190.88a15.26 15.26 0 0 1-8.12-2.54l1.52-4a12 12 0 0 0 6.74 2.4c2.72 0 3.92-1.59 3.92-3.39s-.78-2.93-4.87-4.66c-4.52-1.91-6.14-4.24-6.14-7.34 0-3.74 3.11-7.24 8.51-7.24a12.25 12.25 0 0 1 6.5 1.87l-1.41 3.88a10 10 0 0 0-5.19-1.86c-2.72 0-4 1.48-4 3.21s1.27 2.75 4.48 4.17c5.12 2.22 6.6 4.31 6.6 7.7.01 4.24-3.2 7.8-8.54 7.8zM350.69 190.88c-8.19 0-13.95-5.65-13.95-13.35s5.83-13.38 13.95-13.38a16.22 16.22 0 0 1 8.33 2.37l-1.52 3.74a14.64 14.64 0 0 0-6.88-2c-5.68 0-9.14 3.78-9.14 9.25s3.57 9.22 9.25 9.22a14.77 14.77 0 0 0 7.06-2l1.34 3.74a16.15 16.15 0 0 1-8.44 2.41zM375.51 184.14h-10.45c.32 2.12 1.59 3.46 4.7 3.46a16 16 0 0 0 4.38-.81l.49 3.11a21.8 21.8 0 0 1-5.26.85c-5.65 0-8.26-3.5-8.26-7.77 0-4.06 2.72-7.87 7.63-7.87 4.52 0 6.88 3.21 6.88 7.24a10.69 10.69 0 0 1-.11 1.79zm-3.51-2.51c-.18-2-1.38-3.39-3.39-3.39s-3.25 1.24-3.53 3.39zM389 190.46v-9.32c0-1.91-.71-2.72-2.3-2.72a5.82 5.82 0 0 0-4 2.12v9.92h-4v-15.08h3.88v2.51a8 8 0 0 1 5.58-2.79c3.32 0 4.87 2.08 4.87 5v10.31zM401.85 178.63v6.92c0 1.34.64 1.84 1.8 1.84a5.82 5.82 0 0 0 1.31-.18l.74 3.11a14.49 14.49 0 0 1-3.21.42c-2.82 0-4.63-1.38-4.63-5.4v-6.71H395v-.53l2.86-2.86v-2.44l4-2.51v5.08h4.2v3.25zM422.37 184.14h-10.45c.32 2.12 1.59 3.46 4.7 3.46a16 16 0 0 0 4.38-.81l.49 3.11a21.8 21.8 0 0 1-5.26.85c-5.65 0-8.26-3.5-8.26-7.77 0-4.06 2.72-7.87 7.63-7.87 4.52 0 6.88 3.21 6.88 7.24a10.69 10.69 0 0 1-.11 1.79zm-3.46-2.51c-.18-2-1.38-3.39-3.39-3.39s-3.25 1.24-3.53 3.39zM429.54 180.54v9.92h-4v-15.08h3.88v2.47a6.22 6.22 0 0 1 5.37-2.75v4c-2.36-.29-4.34.13-5.25 1.44zM442.07 190.74a10.15 10.15 0 0 1-6-2l1.55-2.86a7.81 7.81 0 0 0 4.34 1.77c1.48 0 2.15-.6 2.15-1.55 0-2.4-7.17-1.45-7.17-6.25 0-2.72 2.33-4.77 5.75-4.77a10.46 10.46 0 0 1 4.94 1.41l-1.24 2.93a7.69 7.69 0 0 0-3.88-1.31c-1.34 0-2 .64-2 1.41 0 2.22 7.31 1.38 7.31 6.39.08 2.78-2.39 4.83-5.75 4.83zM203.22 229.17c-4.7 0-8-3.36-8-7.63a7.73 7.73 0 0 1 7.71-7.77h.29a9.86 9.86 0 0 1 5 1.52l-1.13 2.12a8.42 8.42 0 0 0-4.17-1.24c-2.89 0-5.08 2-5.08 5.37a5.15 5.15 0 0 0 5.07 5.23h.19a8.42 8.42 0 0 0 4.17-1.24l1 2.12a9.92 9.92 0 0 1-5.05 1.52zM217.84 229.17a7.7 7.7 0 1 1 7.49-7.91v.21a7.38 7.38 0 0 1-7.07 7.69zm0-13.14c-2.86 0-4.77 2.19-4.77 5.44s1.91 5.44 4.77 5.44 4.73-2.19 4.73-5.44-1.9-5.47-4.73-5.47zM228.86 228.89V203h2.79v25.88zM235.89 228.89V203h2.79v25.88zM251.92 228.89v-1.55a6.45 6.45 0 0 1-4.59 1.84c-2.93 0-5.37-1.73-5.37-4.77 0-2.68 2.3-4.63 5.33-4.63a10.22 10.22 0 0 1 4.48 1v-.88c0-2.51-1.17-3.67-3.88-3.67a10.62 10.62 0 0 0-3.89.77l-.46-2.4a17.38 17.38 0 0 1 4.7-.78c4.24 0 6.25 2 6.25 6.29v8.83zm-.14-5.79a7.3 7.3 0 0 0-4-1.2c-1.91 0-3.14.85-3.14 2.51s1.24 2.54 3.43 2.54a4.94 4.94 0 0 0 3.74-1.84zM265.48 229.17a7.11 7.11 0 0 1-4.66-1.73v1.45h-2.65V203H261v12.4a7.78 7.78 0 0 1 4.84-1.62c4 0 7 3.11 7 7.59a7.62 7.62 0 0 1-7.36 7.8zm-.21-13.06a5.77 5.77 0 0 0-4.31 1.77v7a5.24 5.24 0 0 0 4 1.94c3 0 5.09-2.26 5.09-5.44-.05-2.91-1.82-5.28-4.78-5.28zM283.13 229.17a7.7 7.7 0 1 1 7.49-7.91v.21a7.38 7.38 0 0 1-7.07 7.69zm0-13.14c-2.86 0-4.77 2.19-4.77 5.44s1.91 5.44 4.77 5.44 4.73-2.19 4.73-5.44S286 216 283.13 216zM296.8 218.75v10.13H294v-14.82h2.65v2.47a6.68 6.68 0 0 1 5.3-2.75v2.72a6.15 6.15 0 0 0-5.15 2.25zM313.25 228.89v-1.55a6.45 6.45 0 0 1-4.59 1.84c-2.93 0-5.37-1.73-5.37-4.77 0-2.68 2.3-4.63 5.33-4.63a10.22 10.22 0 0 1 4.48 1v-.88c0-2.51-1.17-3.67-3.88-3.67a10.74 10.74 0 0 0-3.88.74l-.46-2.4a17.45 17.45 0 0 1 4.7-.78c4.24 0 6.25 2 6.25 6.29v8.83zm-.14-5.79a7.3 7.3 0 0 0-4-1.2c-1.91 0-3.14.85-3.14 2.51s1.24 2.54 3.43 2.54a4.94 4.94 0 0 0 3.74-1.84zM323.11 216.46v8.33c0 1.38.78 1.94 2.33 1.94a7.33 7.33 0 0 0 1.24-.11l.28 2.26a12.5 12.5 0 0 1-2.44.28c-2.68 0-4.13-1.41-4.13-4.66v-8.05H318v-.35l2.37-2.3v-2.58l2.72-2v4.84h4.38v2.4zM343 222.32h-10.93c.32 2.54 1.73 4.45 5.54 4.45a13.7 13.7 0 0 0 4.1-.81l.49 2.37a18.56 18.56 0 0 1-4.84.85c-5.33 0-8-3.36-8-7.63 0-4.06 2.61-7.77 7.2-7.77 4.2 0 6.5 3.11 6.5 7.13a6.65 6.65 0 0 1-.06 1.41zm-2.47-2.12c-.18-2.3-1.48-4.1-4.1-4.1-2.4 0-3.88 1.55-4.2 4.1zM367.81 229.27h-.46l-4.52-10.06-4.59 10.06h-.46l-5.33-15.22h3.11l2.9 9.67 4.1-9.74h.44l4.38 9.74 2.72-9.67h3zM376.78 210.7a1.78 1.78 0 1 1 1.77-1.79 1.77 1.77 0 0 1-1.77 1.79zm-1.41 18.18v-14.82h2.79v14.83zM385.89 216.46v8.33c0 1.38.78 1.94 2.33 1.94a7.33 7.33 0 0 0 1.24-.11l.28 2.26a12.5 12.5 0 0 1-2.44.28c-2.68 0-4.13-1.41-4.13-4.66v-8.05h-2.37v-.35l2.37-2.3v-2.58l2.72-2v4.84h4.38v2.4zM403.23 228.89v-9.32c0-2.29-1-3.46-3.11-3.46a6.94 6.94 0 0 0-4.62 2.4v10.38h-2.79V203h2.79v13.28a7.49 7.49 0 0 1 5.33-2.51c3.43 0 5.19 2.08 5.19 5v10.06zM429.18 229.31c-7 0-10.84-3.74-10.84-10.95V203h6v14.94c0 3.67 1.55 5.9 5 5.9s4.94-2.22 4.94-5.9V203h6v15.36c-.01 7.21-4.14 10.95-11.1 10.95zM469.54 229.31l-.81.07-7.94-15.5-7.79 15.5-.78-.07-9.48-26.31h6.88l4.17 13.59 6.74-13.8h.64l6.78 13.7 4.13-13.49h6.74zM209.9 267.74c-8.44 0-14.16-5.68-14.16-13.35S201.46 241 209.9 241a15.79 15.79 0 0 1 8.09 2.26l-1.84 5.08a12.92 12.92 0 0 0-6.18-1.73c-4.84 0-7.84 3-7.84 7.77s3 7.77 7.84 7.77a12.81 12.81 0 0 0 6.46-1.91l1.8 5.09a15.74 15.74 0 0 1-8.33 2.41zM228.4 267.6c-5.19 0-8.26-3.64-8.26-7.94s3.07-7.94 8.26-7.94 8.23 3.64 8.23 7.94-3.04 7.94-8.23 7.94zm0-12c-1.94 0-3.07 1.48-3.07 4.06s1.13 4.06 3.07 4.06 3-1.48 3-4.06-1.09-4.07-3-4.07zM247.15 267.6c-5.19 0-8.26-3.64-8.26-7.94s3.07-7.94 8.26-7.94 8.23 3.64 8.23 7.94-3.04 7.94-8.23 7.94zm0-12c-1.94 0-3.07 1.48-3.07 4.06s1.13 4.06 3.07 4.06 3-1.48 3-4.06-1.09-4.07-3-4.07zM267.35 267.6a7.3 7.3 0 0 1-3.6-.85v8.19h-5.23V252h5.08v1.38a6.37 6.37 0 0 1 4.52-1.66c3.92 0 6.74 3.35 6.74 7.84s-3.1 8.04-7.51 8.04zm-.67-11.83a3.51 3.51 0 0 0-2.93 1.41v5.33a3.64 3.64 0 0 0 2.75 1c1.66 0 3.14-1.24 3.14-4 0-2.33-1.12-3.74-2.96-3.74zM292.53 261.24h-10c.32 1.73 1.41 2.47 3.85 2.47a18.89 18.89 0 0 0 4.66-.81l.49 3.85a24.76 24.76 0 0 1-5.68.85c-6 0-8.51-3.6-8.51-7.87a7.75 7.75 0 0 1 7.49-8h.56c4.84 0 7.27 3.35 7.27 7.38-.03.47-.06 1.6-.13 2.13zm-4.45-2.86a2.66 2.66 0 0 0-2.58-2.72h-.14c-1.55 0-2.58.92-2.82 2.72zM300.79 257.64v9.67h-5.26V252h5.12v2.47a5.93 5.93 0 0 1 5.47-2.75V257c-2.51-.6-4.48-.53-5.33.64zM316.65 267.31V266a5.46 5.46 0 0 1-4.17 1.59c-3 0-5.26-1.73-5.26-4.77 0-2.65 2-4.73 5.61-4.73a6.92 6.92 0 0 1 3.67.92v-.39c0-2.19-1.31-3-3.43-3a16.22 16.22 0 0 0-3.6.53l-.46-3.64a19.74 19.74 0 0 1 5-.78c5.23 0 7.7 2.44 7.7 7v8.58zm-.14-5.51a2.91 2.91 0 0 0-2.19-.81 2 2 0 0 0-2.19 1.79 1.79 1.79 0 0 0 1.73 1.85h.27a2.65 2.65 0 0 0 2.37-1.09zM331.93 256.12v5.47c0 1.31.49 1.77 1.31 1.77a5 5 0 0 0 1.34-.25l1.2 3.92a16.94 16.94 0 0 1-4 .57c-3 0-5.12-1.31-5.12-6.14v-5.33h-3.35v-.74l3.35-3.39v-2.33l5.23-3V252H336v4.13zM341.65 249.62a2.92 2.92 0 0 1-2.93-2.91 2.93 2.93 0 1 1 5.86 0 2.92 2.92 0 0 1-2.91 2.93zM339 267.31V252h5.26v15.32zM355.28 267.7h-1L346 252h5.79l3.14 7.56 3.14-7.56h5.68zM379.46 261.24h-10c.32 1.73 1.41 2.47 3.85 2.47a18.89 18.89 0 0 0 4.66-.81l.49 3.85a24.76 24.76 0 0 1-5.68.85c-6 0-8.51-3.6-8.51-7.87a7.75 7.75 0 0 1 7.49-8h.56c4.84 0 7.27 3.35 7.27 7.38-.02.47-.06 1.6-.13 2.13zm-4.46-2.86a2.66 2.66 0 0 0-2.58-2.72h-.14c-1.55 0-2.58.92-2.82 2.72zM390.52 267.31v-25.88h16.38v5.51h-10.38v4.63H406v5.23h-9.46v5h10.36v5.47zM420.21 267.31l-2.86-4.66-2.93 4.66h-5.54l5.4-7.59-5.4-7.73h5.68l2.86 4.7 2.93-4.7h5.54l-5.37 7.63 5.37 7.7zM434.9 256.12v5.47c0 1.31.49 1.77 1.31 1.77a5 5 0 0 0 1.34-.25l1.2 3.92a16.94 16.94 0 0 1-4 .57c-3 0-5.12-1.31-5.12-6.14v-5.33h-3.35v-.74l3.35-3.39v-2.33l5.23-3V252H439v4.13zM456.13 261.24h-10c.32 1.73 1.41 2.47 3.85 2.47a18.89 18.89 0 0 0 4.66-.81l.49 3.85a24.76 24.76 0 0 1-5.68.85c-6 0-8.51-3.6-8.51-7.87a7.75 7.75 0 0 1 7.49-8h.57c4.84 0 7.27 3.35 7.27 7.38-.04.47-.07 1.6-.14 2.13zm-4.45-2.86a2.66 2.66 0 0 0-2.58-2.72h-.1c-1.55 0-2.58.92-2.82 2.72zM469.47 267.31V258c0-1.48-.6-1.94-1.62-1.94a4.88 4.88 0 0 0-3.46 1.84v9.43h-5.26V252h5.12v2.75c2-2 3.78-3 5.72-3 3.18 0 4.77 2.08 4.77 5.08v10.52zM483.63 267.6a12.15 12.15 0 0 1-6.64-2l1.66-3.74a9.66 9.66 0 0 0 5 1.87c1.24 0 1.77-.42 1.77-1 0-1.91-7.45-.74-7.45-5.86 0-3.11 2.75-5.15 6.5-5.15a12.78 12.78 0 0 1 5.58 1.45l-1.27 3.74a10.32 10.32 0 0 0-4.55-1.38c-1 0-1.59.42-1.59 1 0 1.94 7.73.74 7.73 6.21-.03 2.98-2.96 4.86-6.74 4.86zM495.92 249.62a2.92 2.92 0 0 1-2.93-2.91 2.93 2.93 0 1 1 5.86 0 2.92 2.92 0 0 1-2.91 2.93zm-2.65 17.69V252h5.26v15.32zM510.12 267.6c-5.19 0-8.26-3.64-8.26-7.94s3.07-7.94 8.26-7.94 8.23 3.64 8.23 7.94-3.04 7.94-8.23 7.94zm0-12c-1.94 0-3.07 1.48-3.07 4.06s1.13 4.06 3.07 4.06 3-1.48 3-4.06-1.12-4.07-3-4.07zM531.83 267.31V258c0-1.48-.6-1.94-1.62-1.94a4.88 4.88 0 0 0-3.46 1.84v9.43h-5.26V252h5.12v2.75c2-2 3.78-3 5.72-3 3.18 0 4.77 2.08 4.77 5.08v10.52zM204.49 192.64l-3.73-6.75c8.5-4.29 14.69-9 18.42-14.21a12.27 12.27 0 0 1-6.91 2c-8.89 0-14.29-6.43-14.29-14.37 0-8.1 6-15.88 16.28-15.88s16.36 7.15 16.36 17c-.01 11.01-6.84 22.68-26.13 32.21zm9.69-42.16c-4.84 0-7.46 3.81-7.46 8.26 0 5 2.7 8.42 7.3 8.42 5 0 7.7-3.1 7.7-8.34 0-4.82-3-8.34-7.54-8.34z" fill="#4d4d4d"/>
  <path fill="gray" d="M99.67 115.48H75.89L64 136.07l11.89 20.59h23.78l11.88-20.59-11.88-20.59z"/>
  <path fill="#b3b3b3" d="M138.1 137.44h-23.77l-11.89 20.59 11.89 20.6h23.77l11.89-20.6-11.89-20.59z"/>
  <path fill="gray" d="M176.54 115.48h-23.78l-11.89 20.59 11.89 20.59h23.78l11.89-20.59-11.89-20.59z"/>
  <path fill="#666" d="M99.67 159.41H75.89L64 180l11.89 20.59h23.78L111.55 180l-11.88-20.59z"/>
  <path fill="#ccc" d="M138.1 181.37h-23.77l-11.89 20.59 11.89 20.59h23.77l11.89-20.59-11.89-20.59z"/>
  <path fill="#666" d="M176.54 159.41h-23.78L140.87 180l11.89 20.59h23.78L188.43 180l-11.89-20.59z"/>
  <path fill="#b3b3b3" d="M176.54 71.55h-23.78l-11.89 20.59 11.89 20.59h23.78l11.89-20.59-11.89-20.59z"/>
  <path fill="#666" d="M214.97 93.52H191.2l-11.89 20.59 11.89 20.59h23.77l11.89-20.59-11.89-20.59zM138.1 93.52h-23.77l-11.89 20.59 11.89 20.59h23.77l11.89-20.59-11.89-20.59z"/>
</svg>
                                    </div>

                                    <div class="rs_svgs">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 382">
  <path d="M220.81 190.62c-11.05 0-18.24-8-18.24-18.51 0-12.72 7.54-25.44 28.77-36l4.12 7.72c-9.38 4.38-17 9.65-20.79 15.87a13.12 13.12 0 0 1 8.68-2.89c9.82 0 15.52 7.28 15.52 16a17.62 17.62 0 0 1-17.44 17.81zm.26-26.66c-5.53 0-8.77 3.42-8.77 9.3 0 5.35 3.51 9.47 8.51 9.47 5.44 0 8.42-4.39 8.42-9.39 0-5.53-3.15-9.34-8.15-9.34z" fill="#c5050c"/>
  <path fill="#c90000" d="M135.33 155.8h-25.81l-12.9 22.34 12.9 22.35h25.81l12.9-22.35-12.9-22.34z"/>
  <path fill="#c5050c" d="M177.04 179.63h-25.8l-12.9 22.35 12.9 22.35h25.8l12.9-22.35-12.9-22.35z"/>
  <path fill="#9b0000" d="M135.33 203.47h-25.81l-12.9 22.35 12.9 22.34h25.81l12.9-22.34-12.9-22.35z"/>
  <path fill="#c5050c" d="M177.04 227.31h-25.8l-12.9 22.34 12.9 22.35h25.8l12.9-22.35-12.9-22.34z"/>
  <path fill="#9b0000" d="M218.76 203.47h-25.81l-12.9 22.35 12.9 22.34h25.81l12.9-22.34-12.9-22.35zM177.04 131.96h-25.8l-12.9 22.35 12.9 22.34h25.8l12.9-22.34-12.9-22.35z"/>
  <path d="M271.59 185.49c-8.89 0-15.14-6.13-15.14-14.48s6.32-14.52 15.14-14.52a17.53 17.53 0 0 1 9 2.57l-1.59 4.05a15.84 15.84 0 0 0-7.47-2.15c-6.17 0-9.92 4.1-9.92 10s3.87 10 10 10a16 16 0 0 0 7.66-2.22l1.46 4.06a17.59 17.59 0 0 1-9.14 2.69zM303.28 185l-2.72-6.44h-11.11l-2.72 6.44h-4.94l13-28.47h.69L308.34 185zM295 165.41l-4 9.39h8zM311.29 185v-28.06h4.79v23.72h12.34V185zM338.88 185.49a16.57 16.57 0 0 1-8.81-2.76l1.65-4.29A13 13 0 0 0 339 181c3 0 4.25-1.72 4.25-3.68s-.84-3.18-5.29-5.06c-4.9-2.07-6.67-4.6-6.67-8 0-4.06 3.37-7.85 9.24-7.85a13.32 13.32 0 0 1 7.05 2l-1.53 4.21a10.87 10.87 0 0 0-5.63-2c-3 0-4.33 1.61-4.33 3.49s1.38 3 4.87 4.52c5.56 2.41 7.17 4.67 7.17 8.35.03 4.64-3.46 8.51-9.25 8.51zM375.18 185.49c-8.89 0-15.14-6.13-15.14-14.48s6.32-14.52 15.14-14.52a17.53 17.53 0 0 1 9 2.57l-1.65 4.06a15.8 15.8 0 0 0-7.43-2.12c-6.17 0-9.92 4.1-9.92 10s3.87 10 10 10a16 16 0 0 0 7.66-2.22l1.46 4.06a17.6 17.6 0 0 1-9.12 2.65zM402.12 178.17h-11.35c.35 2.3 1.72 3.75 5.1 3.75a17.41 17.41 0 0 0 4.75-.88l.54 3.37a23.56 23.56 0 0 1-5.71.92c-6.13 0-9-3.79-9-8.43 0-4.41 3-8.55 8.28-8.55 4.9 0 7.47 3.49 7.47 7.85a11.77 11.77 0 0 1-.08 1.97zm-3.76-2.72c-.19-2.22-1.49-3.68-3.68-3.68s-3.53 1.34-3.83 3.68zM416.72 185v-10.09c0-2.07-.77-2.95-2.49-2.95a6.32 6.32 0 0 0-4.33 2.3V185h-4.37v-16.34h4.22v2.72a8.42 8.42 0 0 1 6.05-3c3.6 0 5.29 2.26 5.29 5.48V185zM430.71 172.19v7.51c0 1.46.69 2 2 2a6.74 6.74 0 0 0 1.42-.19l.8 3.37a16.37 16.37 0 0 1-3.49.46c-3.07 0-5-1.49-5-5.86v-7.28h-3.1v-.57l3.1-3.1v-2.64l4.33-2.72v5.52h4.56v3.53zM453 178.17h-11.37c.35 2.3 1.72 3.75 5.1 3.75a17.41 17.41 0 0 0 4.75-.88l.54 3.37a23.56 23.56 0 0 1-5.71.92c-6.13 0-9-3.79-9-8.43 0-4.41 3-8.55 8.28-8.55 4.9 0 7.47 3.49 7.47 7.85a10.79 10.79 0 0 1-.06 1.97zm-3.76-2.72c-.19-2.22-1.49-3.68-3.68-3.68s-3.53 1.34-3.83 3.68zM460.75 174.26V185h-4.37v-16.34h4.22v2.68a6.74 6.74 0 0 1 5.82-3v4.29c-2.53-.25-4.67.21-5.67 1.63zM474.36 185.33a11 11 0 0 1-6.48-2.15l1.69-3.1a8.44 8.44 0 0 0 4.71 1.92c1.61 0 2.34-.65 2.34-1.69 0-2.61-7.78-1.57-7.78-6.78 0-2.95 2.53-5.17 6.25-5.17a11.34 11.34 0 0 1 5.36 1.53l-1.34 3.18a8.38 8.38 0 0 0-4.22-1.42c-1.46 0-2.15.69-2.15 1.53 0 2.41 7.93 1.49 7.93 6.94.01 2.99-2.67 5.21-6.31 5.21zM266.42 226.73V225a7 7 0 0 1-5 2c-3.18 0-5.82-1.88-5.82-5.17 0-2.91 2.49-5 5.79-5a11.23 11.23 0 0 1 4.87 1.07v-1c0-2.72-1.26-4-4.22-4a11.66 11.66 0 0 0-4.21.8l-.5-2.61a19.16 19.16 0 0 1 5.1-.84c4.6 0 6.78 2.18 6.78 6.82v9.58zm-.15-6.28a8 8 0 0 0-4.37-1.3c-2.07 0-3.41.92-3.41 2.72s1.34 2.76 3.72 2.76a5.36 5.36 0 0 0 4.06-2zM276.23 215.73v11h-3v-16.09h2.87v2.68a7.26 7.26 0 0 1 5.75-3v3a6.67 6.67 0 0 0-5.62 2.41zM298.3 219.6h-11.8c.34 2.76 1.88 4.83 6 4.83a15 15 0 0 0 4.44-.88l.54 2.57a20 20 0 0 1-5.25.92c-5.79 0-8.7-3.64-8.7-8.28 0-4.41 2.84-8.43 7.82-8.43 4.56 0 7 3.37 7 7.74a7.12 7.12 0 0 1-.05 1.53zm-2.68-2.3c-.19-2.49-1.61-4.44-4.44-4.44-2.61 0-4.21 1.69-4.56 4.44zM320.11 201.33a6.83 6.83 0 0 0-1.49-.19c-2.84 0-3.83 1.19-3.83 4.56v4.94h4.75v2.61h-4.75v13.49h-3v-13.5h-2.49v-.38l2.49-2.49v-4.25c0-5 2.07-7.74 6.32-7.74a7.8 7.8 0 0 1 2.49.34zM329.3 227a8.36 8.36 0 0 1 0-16.71 8 8 0 0 1 8.12 8.35c0 4.59-3.21 8.36-8.12 8.36zm0-14.26c-3.1 0-5.17 2.38-5.17 5.9s2.07 5.9 5.17 5.9 5.13-2.38 5.13-5.9-2.06-5.86-5.13-5.86zM349.19 227c-5.1 0-8.7-3.64-8.7-8.28a8.41 8.41 0 0 1 8.36-8.44h.34a10.65 10.65 0 0 1 5.48 1.65l-1.23 2.3a9 9 0 0 0-4.52-1.34c-3.14 0-5.52 2.15-5.52 5.83a5.59 5.59 0 0 0 5.51 5.67h.2a9 9 0 0 0 4.52-1.34l1 2.3a10.69 10.69 0 0 1-5.44 1.65zM368.7 226.73v-2.26a9 9 0 0 1-5.79 2.57c-3.76 0-5.56-2.26-5.56-5.48v-10.92h3v10.12c0 2.49 1.07 3.76 3.37 3.76a7 7 0 0 0 4.79-2.45v-11.43h3v16.09zM380.5 227a9 9 0 0 1-5.75-2.11l1.53-2.15a6.66 6.66 0 0 0 4.06 1.8c1.88 0 2.76-.88 2.76-2.3 0-3.14-7.51-2.34-7.51-7.17 0-2.53 2.07-4.79 5.48-4.79a9 9 0 0 1 4.67 1.53l-1.34 2.26a6 6 0 0 0-3.45-1.34c-1.84 0-2.61.92-2.61 2.07 0 2.72 7.47 2.15 7.47 7.13a5.14 5.14 0 0 1-5.21 5.07zM403.42 219.6h-11.8c.34 2.76 1.88 4.83 6 4.83a15 15 0 0 0 4.44-.88l.54 2.57a20 20 0 0 1-5.25.92c-5.79 0-8.7-3.64-8.7-8.28 0-4.41 2.84-8.43 7.82-8.43 4.56 0 7 3.37 7 7.74a7.12 7.12 0 0 1-.05 1.53zm-2.68-2.3c-.19-2.49-1.61-4.44-4.44-4.44-2.61 0-4.21 1.69-4.56 4.44zM419.32 226.73v-1.65a7 7 0 0 1-5.13 2c-4.64 0-7.86-3.37-7.86-8.2a8.24 8.24 0 0 1 7.93-8.51 7.49 7.49 0 0 1 4.9 1.61v-13.3h3v28.09zm-.15-11.73a5.93 5.93 0 0 0-4.67-2.18c-3 0-5.17 2.45-5.17 5.9 0 3.22 2 5.75 5.36 5.75a5.67 5.67 0 0 0 4.48-2.11zM442.66 227a8.36 8.36 0 0 1 0-16.71 8 8 0 0 1 8.12 8.35c0 4.59-3.21 8.36-8.12 8.36zm0-14.26c-3.1 0-5.17 2.38-5.17 5.9s2.07 5.9 5.17 5.9 5.13-2.38 5.13-5.9-2.06-5.86-5.13-5.86zM465.65 226.73v-10.12c0-2.49-.92-3.75-3.26-3.75a7.32 7.32 0 0 0-4.9 2.61v11.27h-3v-16.1h2.87v2.45a8.58 8.58 0 0 1 5.94-2.76c3.72 0 5.4 2.26 5.4 5.48v10.92zM270.71 268.9c-8.7 0-14.25-6.25-14.25-14.48s5.82-14.52 14.54-14.52 14.25 6.25 14.25 14.52-5.88 14.48-14.54 14.48zm.11-23.18c-4.44 0-7.43 3.64-7.43 8.7s3 8.7 7.43 8.7 7.43-3.68 7.43-8.7-3-8.71-7.43-8.71zM300.75 268.44v-2.8c-1.88 1.88-4 3.1-6.09 3.1-3.45 0-5.29-2.26-5.29-5.48v-11.45h5.71v10.12c0 1.61.77 2.11 1.88 2.11a4.91 4.91 0 0 0 3.64-1.88v-10.35h5.71v16.63zM317.5 256.29v5.94c0 1.42.54 1.92 1.42 1.92a5.54 5.54 0 0 0 1.46-.27l1.3 4.25a18.82 18.82 0 0 1-4.29.61c-3.26 0-5.56-1.42-5.56-6.67v-5.79h-3.64v-.8l3.64-3.68v-2.53l5.67-3.27v5.79h4.41v4.48zM330.68 257.94v10.5H325v-16.63h5.56v2.68a6.43 6.43 0 0 1 5.94-3v5.67c-2.75-.56-4.9-.49-5.82.78zM354.4 261.84h-10.88c.35 1.88 1.53 2.68 4.18 2.68a20.65 20.65 0 0 0 5.06-.88l.54 4.18a27.3 27.3 0 0 1-6.17.92c-6.51 0-9.24-3.91-9.24-8.55a8.41 8.41 0 0 1 8.11-8.7h.63c5.25 0 7.89 3.64 7.89 8 0 .51-.04 1.78-.12 2.35zm-4.83-3.1a2.88 2.88 0 0 0-3-3 3 3 0 0 0-3.07 3zM366.71 268.44V267a5.91 5.91 0 0 1-4.52 1.72c-3.22 0-5.71-1.88-5.71-5.17 0-2.87 2.22-5.13 6.09-5.13a7.47 7.47 0 0 1 4 1V259c0-2.38-1.42-3.3-3.72-3.3a17.83 17.83 0 0 0-3.91.57l-.5-3.95a21.48 21.48 0 0 1 5.4-.84c5.67 0 8.35 2.64 8.35 7.63v9.31zm-.15-6a3.17 3.17 0 0 0-2.38-.88 2.18 2.18 0 0 0-2.38 2 2 2 0 0 0 2 2h.2a2.88 2.88 0 0 0 2.57-1.19zM384.91 268.74c-6.51 0-9.77-3.91-9.77-8.55s3.26-8.7 9.77-8.7a10.65 10.65 0 0 1 5.48 1.65l-1.65 3.79a7.84 7.84 0 0 0-3.72-1c-2.3 0-4.25 1.23-4.25 4.14 0 2.64 2 4.14 4.48 4.14a7.55 7.55 0 0 0 3.68-1l1.46 3.79a10.69 10.69 0 0 1-5.48 1.74zM404 268.44v-10.12c0-1.61-.65-2.11-1.76-2.11a5.3 5.3 0 0 0-3.76 2v10.23h-5.68v-28.09h5.67v14.33c2.07-2.26 4-3.18 6.09-3.18 3.45 0 5.17 2.26 5.17 5.52v11.42z" fill="#c5050c"/>
</svg>
                                    </div>

                                    <div class="rs_svgs">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/infographics/faculty-extension-18-19.svg" />

                                    </div>

                                    <div class="rs_svgs">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/infographics/staff-extension-18-19.svg" />

                                    </div>

                                </div>
                            </div>

                        </div>
                      </div>



                      <div class="fundraising_wrapper">

<a href="http://www.allwaysforward.org/schools-colleges/cals/" target="_blank" class="fundraising_link">All Ways Forward</a>

<div class="fundraising_left">
    <div class="forwardimage"></div>
</div>

<div class="fundraising_right">
    <div class="fund_right_top">
        Our History<br><span class="space"></span> Moves Us Forward.
    </div>

    <div class="fund_right_bottom">
        <svg width="420" height="89" viewBox="0 0 420 89" xmlns="http://www.w3.org/2000/svg">
<title>
allwaysforward
</title>
<g fill="none" fill-rule="evenodd">
<path d="M83.2674 3.757v9.7716c2.3087.5143 3.976 1.4143 5.1304 2.957.898 1.2858 1.924 3.4715.898 6.6858-1.7958 6.043-6.285 21.8572-6.285 21.8572l-2.052 7.3285-1.0262-3.214v.1284L65.0543 3.243H52.8696L37.7348 52.8713 36.7088 49.4l-1.411-4.8857s-.2565-1.0286-.6413-2.443c-1.4108-5.0142-4.489-16.0713-5.387-19.2856-.6412-2.3143 0-3.857.7696-4.757 1.2827-1.6716 3.4632-2.3144 5.0023-2.5716V3.8858H4.9v9.7714c3.3348.5144 8.4652 2.186 10.0043 8.1C16.187 26 28.5 73.443 31.1935 83.7287h17.5717L56.461 51.843l-1.2827-1.4144 4.1043-15.943 12.1848 49.243h15.6478c2.1805-8.1 15.3913-56.3143 16.9305-61.843 1.539-5.5285 6.6695-6.557 9.2347-6.6856V3.757h-30.013z" fill="#C5050C"/>
<path d="M70.0565 85.657h16.5457c2.1804-8.1 15.9043-58.2427 17.4435-63.7713 1.539-5.5286 6.6695-6.557 9.2347-6.6857V3.757h-31.937V15.2c1.7957.1286 4.2327.643 5.5153 2.443 1.026 1.2856 1.1543 3.0856.6413 5.1427-1.7957 6.1714-6.2848 21.8572-6.2848 21.8572L79.9326 49.4 65.0543 3.243h-14.237L36.7088 49.4l-1.411-4.8857c0-.1286-5.002-17.4857-6.1564-21.8572-.6413-2.314 0-3.857.7696-4.757 1.2825-1.6714 3.463-2.3143 5.002-2.5714V3.757H3.1043V15.2c2.5653.1286 8.5935 1.0286 10.1327 6.8143 1.1543 4.6286 14.3652 55.4143 16.5456 63.6428h16.5457l11.9282-47.314 11.8 47.314zm18.8544 2.9573H67.6195l-9.363-37.9286-9.6196 37.9286H27.474l-.2566-1.1572c-.1283-.6427-15.5196-59.7856-16.8022-64.8-1.1543-4.114-5.9-4.6284-7.824-4.6284h-.7695l-1.7956.257V.6715h37.837v17.3572h-1.4108c-.7696 0-3.2065.3857-4.1044 1.5428-.1282.2572-.6413.7715-.2565 2.1857.7696 2.8287 3.2065 11.443 4.7457 16.843L48.637.0286h18.5978l12.5695 38.957c1.411-5.1427 3.7196-13.1142 4.874-17.1.2565-1.0285.2565-1.9285-.1283-2.4427-.7696-.9-2.5652-1.286-4.1043-1.286h-.3848l-1.6675.1287V.8h37.837v17.4857l-1.6675-.1286h-.3847c-1.7957 0-6.1566.386-7.1826 4.5-1.6674 6.043-17.8283 64.8-17.8283 64.8l-.2565 1.1573z" fill="#221F1F"/>
<path d="M146.224 41l-.216-8.64-4.872 6.168h-.432l-4.92-6.168-.168 8.64h-3.936l.816-17.712.552-.048 7.968 10.056 7.776-10.056.552.048.84 17.712h-3.96zm13.92-10.536l-1.752 4.224h3.48l-1.728-4.224zM164.488 41l-1.32-3.192h-6.072L155.776 41h-4.152l8.28-17.736h.552L168.736 41h-4.248zm16.464 0l-6.456-8.232V41h-4.08V23.408h4.08v7.656l6.168-7.656h4.824l-7.224 8.376L185.872 41h-4.92zm7.32 0V23.408h11.136v3.744h-7.056v3.144h6.432v3.552h-6.432v3.432h7.056V41h-11.136zm26.016-10.536l-1.752 4.224h3.48l-1.728-4.224zM218.632 41l-1.32-3.192h-6.072L209.92 41h-4.152l8.28-17.736h.552L222.88 41h-4.248zm26.16-9.888v8.4c-.976.56-1.996.996-3.06 1.308-1.064.312-2.268.468-3.612.468-1.296 0-2.504-.22-3.624-.66-1.12-.44-2.096-1.06-2.928-1.86-.832-.8-1.488-1.756-1.968-2.868-.48-1.112-.72-2.34-.72-3.684 0-1.344.244-2.576.732-3.696s1.156-2.08 2.004-2.88c.848-.8 1.848-1.42 3-1.86 1.152-.44 2.392-.66 3.72-.66 1.152 0 2.204.136 3.156.408.952.272 1.868.64 2.748 1.104l-1.704 3.288c-1.264-.656-2.576-.984-3.936-.984-.88 0-1.652.128-2.316.384-.664.256-1.224.62-1.68 1.092-.456.472-.8 1.032-1.032 1.68-.232.648-.348 1.356-.348 2.124 0 .832.132 1.588.396 2.268.264.68.628 1.252 1.092 1.716.464.464 1.008.824 1.632 1.08.624.256 1.296.384 2.016.384.656 0 1.172-.036 1.548-.108.376-.072.724-.196 1.044-.372v-2.592h-3.528v-3.48h7.368zM248.2 41V23.408h4.08V41h-4.08zm12.12-13.848v3.888h6.048v3.576h-6.048V41h-4.08V23.408h11.136v3.744h-7.056zm17.688 0V41h-4.08V27.152h-5.28v-3.744h14.64v3.744h-5.28zm-142.86 36.564v9.432c0 1.584.84 2.376 2.52 2.376.288 0 .564-.018.828-.054.264-.036.528-.078.792-.126l.18 1.692c-.408.072-.786.132-1.134.18-.348.048-.726.072-1.134.072-1.296 0-2.286-.342-2.97-1.026-.684-.684-1.026-1.77-1.026-3.258v-9.288h-2.556v-.468l2.556-1.404v-3.24l1.944-1.44v4.788h4.752v1.764h-4.752zm19.872 5.76c0-.888-.132-1.71-.396-2.466-.264-.756-.636-1.404-1.116-1.944-.48-.54-1.056-.96-1.728-1.26-.672-.3-1.416-.45-2.232-.45-.816 0-1.56.156-2.232.468-.672.312-1.248.738-1.728 1.278s-.852 1.182-1.116 1.926c-.264.744-.396 1.56-.396 2.448 0 .888.132 1.704.396 2.448s.636 1.386 1.116 1.926c.48.54 1.056.966 1.728 1.278.672.312 1.416.468 2.232.468.816 0 1.56-.156 2.232-.468.672-.312 1.248-.738 1.728-1.278s.852-1.182 1.116-1.926c.264-.744.396-1.56.396-2.448zm2.016-.036c0 1.08-.186 2.1-.558 3.06-.372.96-.888 1.794-1.548 2.502-.66.708-1.446 1.266-2.358 1.674-.912.408-1.92.612-3.024.612s-2.112-.204-3.024-.612c-.912-.408-1.698-.96-2.358-1.656-.66-.696-1.17-1.524-1.53-2.484-.36-.96-.54-1.98-.54-3.06s.18-2.094.54-3.042c.36-.948.87-1.776 1.53-2.484s1.452-1.266 2.376-1.674c.924-.408 1.938-.612 3.042-.612 1.104 0 2.112.204 3.024.612.912.408 1.698.96 2.358 1.656.66.696 1.17 1.518 1.53 2.466.36.948.54 1.962.54 3.042zM189.04 77v-9.864c0-1.224-.252-2.148-.756-2.772-.504-.624-1.296-.936-2.376-.936-.96 0-1.878.27-2.754.81-.876.54-1.662 1.242-2.358 2.106V77h-2.016v-9.792c0-1.272-.246-2.226-.738-2.862-.492-.636-1.302-.954-2.43-.954-1.008 0-1.938.288-2.79.864-.852.576-1.626 1.26-2.322 2.052V77h-1.98V61.952h1.908v2.556c.72-.744 1.56-1.404 2.52-1.98.96-.576 2.04-.864 3.24-.864 1.08 0 1.968.27 2.664.81.696.54 1.188 1.302 1.476 2.286.744-.888 1.644-1.62 2.7-2.196 1.056-.576 2.196-.864 3.42-.864 1.392 0 2.508.426 3.348 1.278.84.852 1.26 2.13 1.26 3.834V77h-2.016zm18.612-7.524c0-.888-.132-1.71-.396-2.466-.264-.756-.636-1.404-1.116-1.944-.48-.54-1.056-.96-1.728-1.26-.672-.3-1.416-.45-2.232-.45-.816 0-1.56.156-2.232.468-.672.312-1.248.738-1.728 1.278s-.852 1.182-1.116 1.926c-.264.744-.396 1.56-.396 2.448 0 .888.132 1.704.396 2.448s.636 1.386 1.116 1.926c.48.54 1.056.966 1.728 1.278.672.312 1.416.468 2.232.468.816 0 1.56-.156 2.232-.468.672-.312 1.248-.738 1.728-1.278s.852-1.182 1.116-1.926c.264-.744.396-1.56.396-2.448zm2.016-.036c0 1.08-.186 2.1-.558 3.06-.372.96-.888 1.794-1.548 2.502-.66.708-1.446 1.266-2.358 1.674-.912.408-1.92.612-3.024.612s-2.112-.204-3.024-.612c-.912-.408-1.698-.96-2.358-1.656-.66-.696-1.17-1.524-1.53-2.484-.36-.96-.54-1.98-.54-3.06s.18-2.094.54-3.042c.36-.948.87-1.776 1.53-2.484s1.452-1.266 2.376-1.674c.924-.408 1.938-.612 3.042-.612 1.104 0 2.112.204 3.024.612.912.408 1.698.96 2.358 1.656.66.696 1.17 1.518 1.53 2.466.36.948.54 1.962.54 3.042zm9.216 7.992h-.36l-7.236-15.48h2.196l5.292 11.988 5.4-11.988h2.124l-7.416 15.48zm20.808-9.108c-.048-.696-.174-1.344-.378-1.944-.204-.6-.504-1.122-.9-1.566-.396-.444-.882-.792-1.458-1.044s-1.248-.378-2.016-.378c-1.44 0-2.586.45-3.438 1.35-.852.9-1.362 2.094-1.53 3.582h9.72zm1.908.612v.468c0 .144-.024.312-.072.504H229.9c.048.792.198 1.53.45 2.214.252.684.63 1.278 1.134 1.782.504.504 1.134.9 1.89 1.188.756.288 1.65.432 2.682.432.696 0 1.41-.084 2.142-.252.732-.168 1.446-.384 2.142-.648l.216.864c.048.12.078.228.09.324.012.096.03.18.054.252.024.096.036.18.036.252-.768.288-1.572.522-2.412.702-.84.18-1.632.27-2.376.27-1.32 0-2.484-.198-3.492-.594-1.008-.396-1.848-.948-2.52-1.656-.672-.708-1.176-1.536-1.512-2.484-.336-.948-.504-1.962-.504-3.042 0-1.056.162-2.058.486-3.006.324-.948.798-1.782 1.422-2.502.624-.72 1.38-1.29 2.268-1.71.888-.42 1.884-.63 2.988-.63 1.056 0 1.992.186 2.808.558.816.372 1.5.882 2.052 1.53s.966 1.416 1.242 2.304c.276.888.414 1.848.414 2.88zm31.716-1.512c0 1.536-.234 2.922-.702 4.158-.468 1.236-1.134 2.28-1.998 3.132-.864.852-1.908 1.506-3.132 1.962-1.224.456-2.58.684-4.068.684-3.072 0-5.472-.852-7.2-2.556-1.728-1.704-2.592-4.164-2.592-7.38V50.612h2.016v16.776c0 2.688.708 4.716 2.124 6.084 1.416 1.368 3.3 2.052 5.652 2.052 1.176 0 2.25-.174 3.222-.522.972-.348 1.8-.864 2.484-1.548.684-.684 1.212-1.536 1.584-2.556.372-1.02.558-2.19.558-3.51V50.612h2.052v16.812zm29.016 9.936l-.504.072-8.532-22.572-8.46 22.572-.504-.072-6.912-26.748h2.016l5.544 21.636 8.172-21.78h.36l8.244 21.708 5.508-21.564h1.98l-6.912 26.748zm26.532-24.912c-.264-.096-.564-.168-.9-.216-.336-.048-.636-.072-.9-.072-1.2 0-2.088.354-2.664 1.062-.576.708-.864 1.89-.864 3.546v5.184H328v1.764h-4.464V77h-1.98V63.716h-2.52v-.468l2.52-1.404V57.02c0-2.232.462-3.9 1.386-5.004.924-1.104 2.238-1.656 3.942-1.656.408 0 .81.024 1.206.072.396.048.774.144 1.134.288l-.36 1.728zm13.752 17.028c0-.888-.132-1.71-.396-2.466-.264-.756-.636-1.404-1.116-1.944-.48-.54-1.056-.96-1.728-1.26-.672-.3-1.416-.45-2.232-.45-.816 0-1.56.156-2.232.468-.672.312-1.248.738-1.728 1.278s-.852 1.182-1.116 1.926c-.264.744-.396 1.56-.396 2.448 0 .888.132 1.704.396 2.448s.636 1.386 1.116 1.926c.48.54 1.056.966 1.728 1.278.672.312 1.416.468 2.232.468.816 0 1.56-.156 2.232-.468.672-.312 1.248-.738 1.728-1.278s.852-1.182 1.116-1.926c.264-.744.396-1.56.396-2.448zm2.016-.036c0 1.08-.186 2.1-.558 3.06-.372.96-.888 1.794-1.548 2.502-.66.708-1.446 1.266-2.358 1.674-.912.408-1.92.612-3.024.612s-2.112-.204-3.024-.612c-.912-.408-1.698-.96-2.358-1.656-.66-.696-1.17-1.524-1.53-2.484-.36-.96-.54-1.98-.54-3.06s.18-2.094.54-3.042c.36-.948.87-1.776 1.53-2.484s1.452-1.266 2.376-1.674c.924-.408 1.938-.612 3.042-.612 1.104 0 2.112.204 3.024.612.912.408 1.698.96 2.358 1.656.66.696 1.17 1.518 1.53 2.466.36.948.54 1.962.54 3.042zm11.16-5.868c-1.08.048-2.106.33-3.078.846s-1.746 1.278-2.322 2.286V77h-1.98V61.952h1.908v2.844c.696-.984 1.512-1.758 2.448-2.322.936-.564 1.944-.846 3.024-.846v1.944zm17.28 13.86h-.36l-4.824-11.664-4.932 11.664h-.36l-5.076-15.48h2.16l3.384 11.304 4.608-11.304h.36l4.716 11.304 3.24-11.304h2.124l-5.04 15.48zm16.884-6.732c-.744-.408-1.44-.72-2.088-.936-.648-.216-1.392-.324-2.232-.324-1.152 0-2.1.264-2.844.792-.744.528-1.116 1.308-1.116 2.34 0 1.008.366 1.77 1.098 2.286.732.516 1.71.774 2.934.774.912 0 1.728-.186 2.448-.558.72-.372 1.32-.846 1.8-1.422V70.7zm.108 6.3v-1.62c-.552.552-1.242 1.008-2.07 1.368-.828.36-1.722.54-2.682.54-.768 0-1.488-.102-2.16-.306-.672-.204-1.26-.51-1.764-.918-.504-.408-.9-.906-1.188-1.494-.288-.588-.432-1.254-.432-1.998 0-.72.144-1.368.432-1.944.288-.576.684-1.068 1.188-1.476.504-.408 1.098-.726 1.782-.954.684-.228 1.422-.342 2.214-.342.984 0 1.83.114 2.538.342.708.228 1.386.498 2.034.81V67.64c0-1.44-.33-2.502-.99-3.186-.66-.684-1.782-1.026-3.366-1.026-.624 0-1.29.072-1.998.216-.708.144-1.35.348-1.926.612l-.396-1.728c.696-.264 1.452-.474 2.268-.63.816-.156 1.572-.234 2.268-.234 2.112 0 3.66.498 4.644 1.494s1.476 2.49 1.476 4.482V77h-1.872zm13.572-13.428c-1.08.048-2.106.33-3.078.846s-1.746 1.278-2.322 2.286V77h-1.98V61.952h1.908v2.844c.696-.984 1.512-1.758 2.448-2.322.936-.564 1.944-.846 3.024-.846v1.944zm14.22 2.088c-.552-.648-1.248-1.188-2.088-1.62-.84-.432-1.788-.648-2.844-.648-.792 0-1.524.15-2.196.45-.672.3-1.254.72-1.746 1.26s-.876 1.182-1.152 1.926c-.276.744-.414 1.572-.414 2.484 0 .864.138 1.668.414 2.412.276.744.654 1.386 1.134 1.926.48.54 1.068.96 1.764 1.26.696.3 1.452.45 2.268.45 1.032 0 1.962-.216 2.79-.648.828-.432 1.518-.996 2.07-1.692v-7.56zm.072 11.34v-1.836c-.624.624-1.374 1.134-2.25 1.53-.876.396-1.854.594-2.934.594-1.056 0-2.034-.192-2.934-.576-.9-.384-1.674-.918-2.322-1.602-.648-.684-1.152-1.5-1.512-2.448-.36-.948-.54-1.986-.54-3.114 0-1.104.192-2.136.576-3.096.384-.96.912-1.794 1.584-2.502.672-.708 1.458-1.266 2.358-1.674.9-.408 1.854-.612 2.862-.612 1.08 0 2.04.174 2.88.522.84.348 1.56.798 2.16 1.35V50.612h1.98V77h-1.908z" fill="#3A3A3A"/>
</g>
</svg>
    </div>
</div>


</div>


				<?php endwhile; // end of the loop. ?>



		</div>

	</main> <!-- #main -->
	</div><!-- #primary -->

</div><!-- .site-content-inner -->
<?php get_footer(); ?>
