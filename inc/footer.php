			</article>
			<footer class="row">
				<!-- 
					Set timezone in php.ini for the date object, example (approx. line numbers)
					===========================================================================
					922 [Date]
	 				923 ; Defines the default timezone used by the date functions
	 				924 ; http://php.net/date.timezone
	 				925 date.timezone = Europe/Stockholm 
	 			-->
				<p class="text-center"><?=WEB_PAGE_TITLE;?> | Copyright &copy; <?=date('Y');?> | <a href="http://vanjaswebb.se/en">Vanja Anderson</a> | 
				<!-- BOOTSTRAP Social buttons: https://lipis.github.io/bootstrap-social/ -->
				<a href="https://github.com/vanjaanderson" class="btn btn-xs btn-social-icon btn-github"><em class="fa fa-github"></em></a> <a href="https://se.linkedin.com/in/vanjaanderson" class="btn btn-xs btn-social-icon btn-linkedin"><em class="fa fa-linkedin"></em></a></p>
			</footer>
		</section>	<!-- /container -->
		<!-- BOOTSTRAP without jQuery, see: https://github.com/tagawa/bootstrap-without-jquery -->
		<script src="<?=DOCUMENT_ROOT;?>/script/js/bootstrap-without-jquery.min"></script>	
		<script src="<?=DOCUMENT_ROOT;?>/script/js/my.js"></script>
	</body>
</html>