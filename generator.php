<?php

$basePath = __DIR__ . '/src/Components/';

$selfClosingTags = [
    'area',
    'base',
    'br',
    'col',
    'embed',
    'hr',
    'img',
    'input',
    'link',
    'meta',
    'param',
    'source',
    'track',
    'wbr'
];

$categories = [

    'Root' => [
        'Html',
        'Head',
        'Body',
        'Title',
        'Base',
        'Link',
        'Meta',
        'Style',
        'Script',
        'Noscript'
    ],

    'Layout' => [
        'Header',
        'Footer',
        'Main',
        'Section',
        'Article',
        'Aside',
        'Nav',
        // 'Div',
        'Span',
        'Address'
    ],

    'Typography' => [
        'H1',
        'H2',
        'H3',
        'H4',
        'H5',
        'H6',
        'P',
        'Pre',
        'Blockquote',
        'Code',
        'Strong',
        'Em',
        'B',
        'I',
        'U',
        'Small',
        'Mark',
        'Del',
        'Ins',
        'Sub',
        'Sup',
        'Abbr',
        'Cite',
        'Q',
        'Time',
        'S',
        'Kbd',
        'Samp',
        'Var',
        'Bdi',
        'Bdo'
    ],

    'Link' => [
        'A'
    ],

    'List' => [
        'Ul',
        'Ol',
        'Li',
        'Dl',
        'Dt',
        'Dd',
        'Menu'
    ],

    'Form' => [
        'Form',
        'Input',
        'Textarea',
        'Select',
        'Option',
        'Optgroup',
        'Label',
        'Button',
        'Fieldset',
        'Legend',
        'Datalist',
        'Output',
        'Progress',
        'Meter'
    ],

    'Table' => [
        'Table',
        'Caption',
        'Thead',
        'Tbody',
        'Tfoot',
        'Tr',
        'Th',
        'Td',
        'Col',
        'Colgroup'
    ],

    'Media' => [
        'Img',
        'Audio',
        'Video',
        'Source',
        'Track',
        'Canvas',
        'Svg',
        'Picture',
        'Figure',
        'Figcaption'
    ],

    'Embedded' => [
        'Iframe',
        'Embed',
        'Object',
        'Param'
    ],

    'Interact' => [
        'Details',
        'Summary',
        'Dialog',
        'Menuitem'
    ]
];

function toTag($class)
{
    return strtolower($class);
}

foreach ($categories as $folder => $classes) {

    $dir = $basePath . $folder . '/';

    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    foreach ($classes as $class) {

        $tag = toTag($class);
        $file = $dir . $class . '.php';

        $namespace = "Exo\\Web\\Components\\$folder";

        $isSelfClosing = in_array($tag, $selfClosingTags);
        $selfClosingProperty = $isSelfClosing
            ? "    protected \$selfClosing = true;\n"
            : '';

        $content = <<<PHP
<?php

namespace $namespace;

use Exo\\Web\\Core\\Component;

class $class extends Component {
    protected \$tag = '$tag';
$selfClosingProperty}

?>
PHP;

        file_put_contents($file, $content);
        echo "Generated: $file\n";
    }
}

echo "✅ Components generated with self-closing support.\\n";
