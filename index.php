<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet' type='text/css'>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>

body {
  background-color: #05182d;
}


@-webkit-keyframes backgroundAnimate {
  from {
    left: 0;
    top: 0;
  }
  to {
    left: -10000px;
    top: -2000px;
  }
}

@-moz-keyframes backgroundAnimate {
  from {
    left: 0;
    top: 0;
  }
  to {
    left: -10000px;
    top: -2000px;
  }
}

@-o-keyframes backgroundAnimate {
  from {
    left: 0;
    top: 0;
  }
  to {
    left: -10000px;
    top: -2000px;
  }
}

@keyframes backgroundAnimate {
  from {
    left: 0;
    top: 0;
  }
  to {
    left: -10000px;
    top: -2000px;
  }
}

#back {
  background: url(http://www.tranexnet.com/img/back.png) repeat 20% 20%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0.4;
  z-index: -1;
  -webkit-animation-name: backgroundAnimate;
  -webkit-animation-duration: 300s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-name: backgroundAnimate;
  -moz-animation-duration: 300s;
  -moz-animation-timing-function: linear;
  -moz-animation-iteration-count: infinite;
  -o-animation-name: backgroundAnimate;
  -o-animation-duration: 300s;
  -o-animation-timing-function: linear;
  -o-animation-iteration-count: infinite;
  animation-name: backgroundAnimate;
  animation-duration: 300s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

#front {
  background: url(http://www.tranexnet.com/img/front.png) repeat 35% 35%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0.6;
  z-index: -1;
  -webkit-animation-name: backgroundAnimate;
  -webkit-animation-duration: 300s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-name: backgroundAnimate;
  -moz-animation-duration: 300s;
  -moz-animation-timing-function: linear;
  -moz-animation-iteration-count: infinite;
  -o-animation-name: backgroundAnimate;
  -o-animation-duration: 300s;
  -o-animation-timing-function: linear;
  -o-animation-iteration-count: infinite;
  animation-name: backgroundAnimate;
  animation-duration: 300s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}


.bounce {
  animation: bounce 2s infinite;
}
@keyframes bounce {
0%,
25%,
50%,
75%,
100% {
transform: translateY(0);
}
40% {
transform: translateY(-20px);
}
60% {
transform: translateY(-12px);
}
}

.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;
}

.polygon-each {
		padding: 10px;
		text-align: center;
	}

	.polygon-each-img-wrap img {
		margin-bottom: 10px;
	}


	@media only screen and (min-width: 800px) {
		.polygon-each {
			display: inline-block;
			width: 47%;
			vertical-align: top;
		}

		.polygon-each img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
	}

	img {
		max-width: 100%;
		height: auto;
	}
	
		.clip-svg {
		width: 0;
		height: 0;
	}
	
	.polygon-clip-octagon {
		-webkit-clip-path: polygon(30% 0, 70% 0, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0 70%, 0 30%);
		clip-path: polygon(30% 0, 70% 0, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0 70%, 0 30%);
		-webkit-clip-path: url("#polygon-clip-octagon");
		clip-path: url("#polygon-clip-octagon");
		
	}



</style>

</head> 

<body>

		<div id="back"></div>
		<div id="front"></div>
		
		
		<div class="polygon-each">	
			<div class="polygon-each-img-wrap"  >
				<img   src="./HomePage/vardhaman.png" alt="demo-clip-octagon">
			</div>
			<svg class="clip-svg">
				<defs>
					<clipPath id="polygon-clip-octagon" clipPathUnits="objectBoundingBox">
						<polygon points="0.3 0, 0.7 0, 1 0.3, 1 0.7, 0.7 1, 0.3 1, 0 0.7, 0 0.3" />
					</clipPath>
				</defs>
			</svg>	
		</div>
		
		
		<div class="polygon-each">	
			<div class="polygon-each-img-wrap"  >
				<i class="fas fa-university"style="font-size:60px;color:#CFD0D6;text-shadow:2px 2px 4px #000000;"></i>
				<p style="font-size:18px; color:#CFD0D6; font-family:cursive;" > Computer Science And Engineering<br>
				We facilitate learning in advanced technologies by adopting innovative methods while we associate continuously with industry, to design and implement experiential curriculum.
We do promote Research and Development through Special Interest Groups. </p>
			</div>
			<svg class="clip-svg">
				<defs>
					<clipPath id="polygon-clip-octagon" clipPathUnits="objectBoundingBox">
						<polygon points="0.3 0, 0.7 0, 1 0.3, 1 0.7, 0.7 1, 0.3 1, 0 0.7, 0 0.3" />
					</clipPath>
				</defs>
			</svg>	
		</div>
		
		<div class="polygon-each">	
			<div class="polygon-each-img-wrap"  >
			<i class="fas fa-book-reader" style="font-size:60px;color:#CFD0D6;text-shadow:2px 2px 4px #000000;"></i>
				<p style="font-size:18px; color:#CFD0D6;font-family:cursive; ">Computers Engineers Technical Association(CETA)<br>
CETA is a CSE department student technical association which strives for all round development of students with co-curricular 
activities like programming contest, technical paper presentation, project expo,etc. The CETA association conducts events round the semester to enhance the students skills in programming aspects and 
creates awareness about upcoming technologies. </p>
			</div>
			<svg class="clip-svg">
				<defs>
					<clipPath id="polygon-clip-octagon" clipPathUnits="objectBoundingBox">
						<polygon points="0.3 0, 0.7 0, 1 0.3, 1 0.7, 0.7 1, 0.3 1, 0 0.7, 0 0.3" />
					</clipPath>
				</defs>
			</svg>	
		</div>
		

		<a href='./HomePage/sample.html' style="text:decoration:none;">
			<div class="polygon-each">
				<div class="polygon-each-img-wrap"  >
					<p style="font-size:20px; color:#CFD0D6;font-family:cursive; ">
					Interested..?<br><br>
						<i class="far fa-lightbulb bounce" style="font-size:80px;color:#CFD0D6;text-shadow:2px 2px 4px #000000;"></i>
						<br><br>Explore Us.!
					</p>
				</div>
				<svg class="clip-svg">
					<defs>
						<clipPath id="polygon-clip-octagon" clipPathUnits="objectBoundingBox">
							<polygon points="0.3 0, 0.7 0, 1 0.3, 1 0.7, 0.7 1, 0.3 1, 0 0.7, 0 0.3" />
						</clipPath>
					</defs>
				</svg>	
			</div>
		</a>
		
		
</body>   
</html>