	</main>
	<footer role="contentinfo">
		
	</footer>
	
	<script type="text/javascript" src="js/custom-script.js"></script>
	<script type="text/javascript">
		$(function(){
			var shrinkHeader = 200;
			$(window).scroll(function(){
				var scroll = getCurrentScroll();
				if ( scroll >= shrinkHeader ) {
					$('header').addClass('scrolled');
				}
				else {
					$('header').removeClass('scrolled');
				}
			});
			function getCurrentScroll() {
				return window.pageYOffset || document.documentElement.scrollTop;
			}
		});
		$(document).ready(function() {
			$('#quick-agreebtn').click(function() {
				$('#overlay').css('display', 'block');
			});
			$('#full-agreebtn').click(function() {
				$('#overlay').css('display', 'block');
			});
		});
	</script>

</body>
</html>