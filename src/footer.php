    </div> <!-- /container -->
  </div> <!-- /not-footer -->


  <footer class="bg-inverse">
    <div class="container">
      <?php if (is_active_sidebar('footer')): ?>
        <div>
          <?php dynamic_sidebar('footer'); ?>
        </div>
      <?php endif; ?>
      <hr>
      <p>&copy; James Ah Yong 2016.</p>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>