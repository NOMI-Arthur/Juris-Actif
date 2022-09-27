
    <?php if(count($erreur) > 0): ?>
                  <div class="msg error">
                   
                  <?php foreach($erreur as $ereur): ?>
                    <li><?php echo $ereur; ?></li>
                    <?php endforeach; ?>
                    <?php unset($erreur); ?>                  
              </div>
    <?php endif; ?>