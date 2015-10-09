
//UI Functions

//Toggle Shuffle, Repeat and playlist open and close CSS
$(function () {
   $('.toggle').click(function () {
     $(this).toggleClass('active');
   });
});

//Toggle Pause and Play button
$(function () {
$('.play').click(function(){
  $(this).children().toggleClass("fa-play").toggleClass("fa-pause");
  });
});

var playlistOpen = false;
var playerOpen = false;

//Open the player
function openplayer() {
	$('#audio-player').show(1);
	$('#playlistmenu').show(1);
	$('#playerToggle').animate({
    right: '18rem',
   }, 1000);
	$('#audio-player').animate({
    right: 	'0rem',
   }, 1000);
   	$('#playlistmenu').animate({
    right: "0rem",
   }, 1000);
}

function closeplayer() {
	$('#playerToggle').animate({
    right: '0rem',
   }, 1000);
	$('#audio-player').animate({
    right: '-18rem',
   }, 1000);
   	$('#playlistmenu').animate({
    right: "-18rem",
   }, 1000);
   $('#playlistmenu').hide(1);
   $('#audio-player').hide(1);
}

//Close the player & Playlist window
function closeboth() {
	$('.playlistToggleArrow').addClass("fa-toggle-up").removeClass("fa-toggle-down");
    $('.playlistToggle').removeClass('active');
	$('#audio-player, #playerToggle').animate({
    bottom: '0',
   }, 600);
   	$('#playlistmenu').animate({
    bottom: '-12rem',
   }, 600);
   $('#audio-player').animate({
    right: '-18rem',
   }, 600);
   $('#playerToggle').animate({
    right: '0rem',
   }, 600);
    $('#audio-player').hide(1);
    $('#playlistmenu').hide(1);
}

function openplaylist() {
	$('#playlistmenu').show(1);
    $('#audio-player, #playerToggle').animate({
    bottom: "12rem",
   }, 700);
   	$('#playlistmenu').animate({
    bottom: "0rem",
   }, 700);
   $('#playlistmenu').show(1);
}

function closeplaylist() {
    $('#audio-player, #playerToggle').animate({
    bottom: "0rem",
   }, 700);
   	$('#playlistmenu').animate({
    bottom: "-12rem",
   }, 700);
   $('#playlistmenu').hide(1);
}

//Close the player using the close button on the player
$('.playerClose').click(function() {
	closeboth();
	playerOpen=false;
	playlistOpen=false;
	$('.playerToggleArrow').removeClass("fa-chevron-right").addClass("fa-chevron-left");
});

$('#playerToggle').click(function() {
  if (playerOpen === false)
  {
      openplayer();
      $('.playlistToggleArrow').removeClass("fa-toggle-up").addClass("fa-toggle-down");
      $('.playerToggleArrow').removeClass("fa-chevron-left").addClass("fa-chevron-right");
      playerOpen = true;
  } else {
     closeplayer();
     playerOpen = false;
     $('.playerToggleArrow').removeClass("fa-chevron-right").addClass("fa-chevron-left");
  }
});


//Playlist Toggle buttons
$('.playlistToggle').click(function() {
  if (playlistOpen === false)
  {
      openplaylist();
      playlistOpen = true;

  } else {
     closeplaylist();
     $('.playlistToggleArrow').addClass("fa-toggle-up").removeClass("fa-toggle-down");
     $('.playlistToggle').removeClass('active');
     playlistOpen = false;
  }
});


//Audio Playing Functions
var audio;

//Initialise Audio

initAudio($('#playlist tr.active'));

//Initialise Function

function initAudio(elements){
	var song = elements.attr("song");
	var title = elements.attr("song");
	var cover = elements.attr("cover");
	var artist = elements.attr("artist");
	var album = elements.attr("album");
	var trackno = elements.attr("trackno");
	var albumtrackno = elements.attr("albumtrackno");

//This is to account for the style in which the music is stored on the server. Any track less then 10 gets a 0 added to the front of it.
	if(albumtrackno < 10){
		albumtrackno = '0' + albumtrackno;}

	audio = new Audio("assets/music/" + artist + "/" + album + "/" + albumtrackno + " " + song + ".mp3");

	if(!audio.currentTime){
		$('.duration').html('0.00');
	}

	$("#audio-player .title").text(song);
	$("#audio-player .artist").text(artist);
	$("#audio-player .album").text(album);
	$("#audio-player .trackno").text(trackno);

	//Insert Album Art
	$('img.cover').attr('src','assets/images/AlbumArt/'+ cover);

	//Set active song
	$("table tr.active").removeClass('active');
	elements.addClass('active');
}

//Next button
$('#next').click(function() {
	audio.pause();
	var next = $("tr.active").next('tr');
	initAudio(next);
	audio.play();
	showDuration();
	$('.duration').fadeIn(400);
});

//Previous Button
$('#prev').click(function() {
	audio.pause();
	var prev = $("tr.active").prev('tr');
	initAudio(prev);
	audio.play();
	showDuration();
	$('.duration').fadeIn(400);
});


//Play Pause Button Combo
$('.play').click(function() {
  if (audio.paused == false) {
      audio.pause();
  } else {
      audio.play();
      showDuration();
      $('.duration').fadeIn(400);
  }
});

//Selecting track from playlist
$("table").delegate("tr", "click", function(){
	$("table tr.active").removeClass('active');
	$(this).addClass('active');
    audio.pause();
    initAudio($(this));
	$('.duration').fadeIn(400);
	$('.play').children().removeClass("fa-play").addClass("fa-pause");
	audio.play();
	showDuration();
});

//Duration Functionality
function showDuration(){
	$(audio).bind('timeupdate', function() {
		//get hours, minutes and seconds
		var s = parseInt(audio.currentTime % 60);
		var m = parseInt((audio.currentTime)/ 60) % 60;
		//If seconds less than 10 add a 0
		if(s < 10){
		s = '0' + s;
		}
		$('.duration').html(m + '.' + s);
			var value = 0;
			if (audio.currentTime > 0){
			value = Math.floor((100 / audio.duration) * audio.currentTime);
		}
		//Update progress bar
		$('.progressbar').css('width',value + '%');
	});
}
