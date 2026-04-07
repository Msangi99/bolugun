<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$htmlPath = $root.'/test.html';
$html = file_get_contents($htmlPath);
if ($html === false) {
    fwrite(STDERR, "Missing test.html\n");
    exit(1);
}

preg_match_all('/<style[^>]*>(.*?)<\/style>/s', $html, $styleMatches);
$css = '';
foreach ($styleMatches[1] as $block) {
    $t = trim($block);
    if (strlen($t) > 20) {
        $css .= $t."\n\n";
    }
}

$cssDir = $root.'/resources/css';
if (! is_dir($cssDir)) {
    mkdir($cssDir, 0755, true);
}
file_put_contents($cssDir.'/constructify.css', $css);

preg_match('/<header id="header"[\s\S]*?<\/header>/', $html, $header);
preg_match('/<footer id="footer"[\s\S]*?<\/footer>/', $html, $footer);

preg_match_all('/<section id="([^"]+)"[^>]*data-builder="section"[^>]*>[\s\S]*?<\/section>/', $html, $sections, PREG_SET_ORDER);

$outDir = $root.'/resources/views/components/home';
if (! is_dir($outDir)) {
    mkdir($outDir, 0755, true);
}

$homeUrl = '{{ url(\'/\') }}';

if (! empty($header[0])) {
    $h = $header[0];
    $h = str_replace('href="index.html"', 'href="'.$homeUrl.'"', $h);
    $h = str_replace('href="index.html#', 'href="#', $h);
    file_put_contents($outDir.'/_header.blade.php', $h);
}

if (! empty($footer[0])) {
    $f = $footer[0];
    $f = str_replace('href="index.html"', 'href="'.$homeUrl.'"', $f);
    file_put_contents($outDir.'/_footer.blade.php', $f);
}

foreach ($sections as $sec) {
    $id = $sec[1];
    $content = $sec[0];
    $name = preg_replace('/[^a-z0-9-]+/i', '-', $id);
    file_put_contents($outDir.'/'.$name.'.blade.php', $content);
}

preg_match('/<a href="#" id="scroll-top"[\s\S]*?<\/a>/', $html, $scroll);
if (! empty($scroll[0])) {
    file_put_contents($outDir.'/_scroll-top.blade.php', $scroll[0]);
}

preg_match('/<script id="builder-vendors-bootstrap-js"[\s\S]*?<\/html>/', $html, $tail);
$scriptsBlock = $tail[0] ?? '';
preg_match_all('/<script[^>]*src="([^"]+)"[^>]*><\/script>/', $scriptsBlock, $srcs);
$inlineScripts = [];
preg_match_all('/<script[^>]*id="([^"]*)"[^>]*>([\s\S]*?)<\/script>/', $scriptsBlock, $inlines, PREG_SET_ORDER);
foreach ($inlines as $im) {
    $body = trim($im[2] ?? '');
    if ($body !== '' && ! str_contains($im[0], 'src=')) {
        $inlineScripts[] = $body;
    }
}

$jsOut = $root.'/resources/js/constructify-page.js';
$bundled = "// Auto-extracted from test.html\n";
foreach ($inlineScripts as $js) {
    $bundled .= "try {\n".$js."\n} catch (e) { console.warn('constructify script block', e); }\n\n";
}
file_put_contents($jsOut, $bundled);

file_put_contents($root.'/scripts/extract-manifest.txt', json_encode([
    'css_bytes' => strlen($css),
    'sections' => array_map(fn ($s) => $s[1], $sections),
    'external_scripts' => $srcs[1] ?? [],
], JSON_PRETTY_PRINT));

echo "Wrote constructify.css (".strlen($css)." bytes)\n";
echo 'Sections: '.implode(', ', array_map(fn ($s) => $s[1], $sections))."\n";
