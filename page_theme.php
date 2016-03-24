<?php

namespace Application\Theme\Customtheme;
use Concrete\Core\Area\Layout\Preset\Provider\ThemeProviderInterface;

class PageTheme extends \Concrete\Core\Page\Theme\Theme implements ThemeProviderInterface
{
    /**
     * Theme name
     *
     * Replaces description.txt Line 1
     *
     * @return string | Theme Name
     */
    public function getThemeName()
    {
        return t('Custom Theme');
    }


    /**
     * Theme description
     *
     * Replaces description.txt Line 2
     *
     * @return string | Theme Description
     */
    public function getThemeDescription()
    {
        return t('A custom theme');
    }


    /**
     * Specifies a grid framework
     *
     * Not content added to a prior theme with a specified framework
     * may result in a framework needing to be provided.
     *
     * @var string | 'foundation', 'bootstrap3', false
     */
    protected $pThemeGridFrameworkHandle = false;


    /**
     * Register Assets
     * Register c5 shipped assets as required or already provided by theme.
     * c5 asset list @ /concrete/config/app.php 'assets' => array(...);
     *
     *
     * Provide Asset
     *
     * If a theme asset is duplicated by C5 you can list c5 assets
     * to be ignored
     *
     * $this->providesAsset('javascript', 'bootstrap/*');
     *
     *
     * Require Asset
     *
     * To add c5 assets to a theme them you can
     * 'require' them here.
     *
     * $this->requireAsset('javascript', 'jquery');
     *
     * @return void
     */
    public function registerAssets()
    {
        $this->requireAsset('javascript', 'jquery');
        $this->requireAsset('javascript', 'picturefill');
    }


    /**
     * Add responsive image maps
     *
     * creates 'thumbnails' of an image added to filemanager
     * can be used to generate the picture tag using:
     * $image = \Core::make('html/image', array($file));
     * $tag = $image->getTag();
     *
     * @return array | array map of image sizes and associated dimension/breakpoint
     */
    public function getThemeResponsiveImageMap()
    {
        return array(
            'large' => '900px',
            'medium' => '768px',
            'small' => '480px',
        );
    }


    /**
     * Areas
     */

    /**
     * Add class names to specified area's advanced settings menu
     *
     * array('Area Name' => array('class-name'))
     *
     * @return array | array map of areas and class names
     */
    public function getThemeAreaClasses()
    {
        return array(
            'Main Area' => array('main--modifier')
        );
    }


    /**
     * Add Layout Presets to an Area
     *
     * use Concrete\Core\Area\Layout\Preset\Provider\ThemeProviderInterface;
     * class ... implements ThemeProviderInterface
     *
     * @return array | array map of areas and a layout structure
     */
    public function getThemeAreaLayoutPresets()
    {
        return array(
            array(
                'handle' => 'two_col',
                'name' => 'Two Column',
                'container' => '<div class="l-cols l-cols--half"></div>',
                'columns' => array(
                    '<div class="l-col"></div>',
                    '<div class="l-col"></div>'
                ),
            ),
            array(
                'handle' => 'three_col',
                'name' => 'Three Column',
                'container' => '<div class="l-cols l-cols--thirds"></div>',
                'columns' => array(
                    '<div class="l-col"></div>',
                    '<div class="l-col"></div>',
                    '<div class="l-col"></div>'
                ),
            ),
            array(
                'handle' => 'four_col',
                'name' => 'Four Column',
                'container' => '<div class="l-cols l-cols--fourths"></div>',
                'columns' => array(
                    '<div class="l-col"></div>',
                    '<div class="l-col"></div>',
                    '<div class="l-col"></div>',
                    '<div class="l-col"></div>'
                ),
            ),
        );

    }


    /**
     * Blocks
     */

    /**
     * Add class names to a block type's advanced settings menu
     *
     * array('block_name' => array('class-name'))
     *
     * @return array | array map of blocks and class names
     */
    public function getThemeBlockClasses()
    {
        return array(
            'content' => array('is-padded'),
            'image' => array(
                'is-centered',
                'is-full',
            ),
        );
    }


    /**
     * Add default block templates to block types
     *
     * array('block_name' => array('template_file.php'))
     *
     * @return array | array map of blocks and template files
     */
    public function getThemeDefaultBlockTemplates()
    {
        return array(
            'autonav' => 'breadcrumb.php'
        );
    }


    /**
     * Editor
     */

    /**
     * Add classes to the WYSIWYG editor
     *
     * array(
     * title => 'Class Name', // Name in dropdown
     * menuClass => 'preview-style-class',  // Apply class to menu dropdown (for preview style)
     * spanClass => 'actual-class-name-applied',  // classes applied to selection
     * forceBlock => 1/-1 // forces class to the block element around selection (or add inline span)
     * )
     *
     * @return array | array map of editor config to add classes
     */
    public function getThemeEditorClasses()
    {
        return array(
            array('title' => t('Title Caps'), 'menuClass' => 'title-caps', 'spanClass' => 'title-caps', 'forceBlock' => 1),
            array('title' => t('Primary Button'), 'menuClass' => '', 'spanClass' => 'btn btn-primary', 'forceBlock' => '-1'),
        );
    }

}
