
        </main>
    </section>
<?php wp_footer(); ?>

<?php if (is_single()): ?>
    <script type="text/javascript" src="<?php assets('js'); ?>/highlight.pack.js"></script>
    <script>
        // Syntax Highlighter
        hljs.initHighlightingOnLoad();
    </script>
<?php endif ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/konami.js/1.4.2/konami.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/classie/1.0.1/classie.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts.min.js"></script>
</body>
</html>