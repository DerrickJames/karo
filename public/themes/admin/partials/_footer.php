	<footer class="container-fluid footer">
		<p class="pull-right">
			<!-- Executed in {elapsed_time} seconds, using {memory_usage}. -->
			<br/>
			Powered by <a href="http://karo.com" target="_blank">&copy;Karo 2014</a>&nbsp;&nbsp;<?php echo BONFIRE_VERSION ?>
		</p>
	</footer>

	<div id="debug"><!-- Stores the Profiler Results --></div>

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>')</script>

	<?php echo Assets::js(); ?>
</body>
</html>
