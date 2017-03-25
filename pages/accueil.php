<div class="tile is-ancestor">
  <!-- All other tile elemnts -->
  <div class="tile is-parent is-vertical">
    <div class="tile is-child box">
      <p class="title"><a href="/equipe">L'équipe</a></p>
    </div>
    <div class="tile is-child box">
      <p class="title">Nous nous engageaons auprès de</p>
      <a href="/esperance-banlieu">Espérance banlieu </a> <br/>
      <a href="/fraternite-en-irak">Fraternité en Iraq </a> <br/>
      <a href="/soeur-de-la-charite">Soeur de la charité </a>
    </div>
    <div class="tile is-child box">
      <p class="title"><a href="/contact">Contact</a></p>
    </div>
  </div>
  
  <div class="tile is-parent is-vertical">
    <div class="tile is-child box">
      <p class="title">Nous aider</p>
    </div>
    <div class="tile is-child box">
      <p class="title"><a href="projet">Projet</a></p>
    </div>
    <div class="tile is-child box">
      <p class="title"><a href="itineraire">Itinéraire</a></p>
    </div>
  </div>
 <div class="tile is-parent">
    <div class="tile is-child box">
      <p class="title"><a href="carnet">Carnet de voyage</a></p>
    </div>
  </div>
</div>

<!-- Slider avec le texte qui défile-->




<div id="carousel">
  <div class="btn-bar">
    <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a> </div>
  </div>
  <div id="slides">
    <ul>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span> I was literally BLOWN AWAY by Company A's work! They went above and beyond all of our expectations with design, usability. and branding, I will reccommend them to everyone I know!<span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">John Doe // Local Business Owner</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span> I could not stop staring! Company A's Web Solutions are by far the most elegant solutions, you can't beat their quality and attention to detail! <span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">Andy Fakename // CEO: Andy's Camping Supplies</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span>Carl Fakeguy, was the most helpful designer I've ever hired. He listened to my ideas and advised against things that could negatively affect my CEO. Company A is by far the most generous and helpful company, 5/5!<span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">Janice Falsename</p>
        </div>
      </li>
    </ul>
  </div>
</div>




« Ayez le courage d’être heureux » Pape françois aux jeunes des JMJ

« On ne peut être heureux qu’en laissant pleinement notre personnalité s’exprimer » Pape françois aux jeunes des JMJ

« Nous nous retrouvons étourdis et abrutis tandis que d’autres (…) décident de l’avenir pour nous » Pape françois aux jeunes des JMJ

« Vivre sans foi n’est pas vivre mais vivoter, il ne faut jamais vivoter » Giorgio Frassati 

“L’homme le plus heureux, c’est celui qui fait le bonheur d’un plus grand nombre d’autre” père Zanotti

“Grâce à L’amour, l’acte le plus banal de, notre vie peut devenir le plus sublime” père Zanotti

“Notre drame à nous est que nous avons souvent peur d’un bonheur trop simple” père Zanotti

« Faire suinter la joie du présent » père Zanotti 













<script>
// script pour le slider
$(document).ready(function () {
    //rotation speed and timer
    var speed = 5000;
    
    var run = setInterval(rotate, speed);
    var slides = $('.slide');
    var container = $('#slides ul');
    var elm = container.find(':first-child').prop("tagName");
    var item_width = container.width();
    var previous = 'prev'; //id of previous button
    var next = 'next'; //id of next button
    slides.width(item_width); //set the slides to the correct pixel width
    container.parent().width(item_width);
    container.width(slides.length * item_width); //set the slides container to the correct total width
    container.find(elm + ':first').before(container.find(elm + ':last'));
    resetSlides();
    
    
    //if user clicked on prev button
    
    $('#buttons a').click(function (e) {
        //slide the item
        
        if (container.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container.stop().animate({
                'left': 0
            }, 1500, function () {
                container.find(elm + ':first').before(container.find(elm + ':last'));
                resetSlides();
            });
        }
        
        if (e.target.id == next) {
            container.stop().animate({
                'left': item_width * -2
            }, 1500, function () {
                container.find(elm + ':last').after(container.find(elm + ':first'));
                resetSlides();
            });
        }
        
        //cancel the link behavior            
        return false;
        
    });
    
    //if mouse hover, pause the auto rotation, otherwise rotate it    
    container.parent().mouseenter(function () {
        clearInterval(run);
    }).mouseleave(function () {
        run = setInterval(rotate, speed);
    });
    
    
    function resetSlides() {
        //and adjust the container so current is in the frame
        container.css({
            'left': -1 * item_width
        });
    }
    
});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
    $('#next').click();
}
</script>