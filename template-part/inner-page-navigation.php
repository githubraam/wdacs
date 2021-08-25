    <?php
        if( have_rows('inner_section_navigator') ): ?>
    <div class="internalNav">
        <ul class="list-unstyled d-flex justify-content-center">
            <?php
                while( have_rows('inner_section_navigator') ) : the_row();
                
                $count = get_row_index();
                
                ?>
            <li>
                <a href="<?php the_sub_field('link'); ?>"
                    class="				
                    <?php
                        if( $count == 1 ){ echo "active "; }
                        
                        $checkHash = get_sub_field('link');
                        
                        if( substr($checkHash, 0, 1 ) === "#" )
                        
                        {echo "moveToDiv"; }
                        
                        ?> ">
                <?php the_sub_field('navigator_name'); ?>					
                </a>
            </li>
            <?php
                endwhile;
                
                ?>
        </ul>
    </div>
    <?php else : endif; ?>