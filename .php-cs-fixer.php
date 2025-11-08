<?php

declare(strict_types=1);

use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__ . '/src'])
    ->name('*.php');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'fully_qualified_strict_types' => true,
        'function_typehint_space' => true,
        'single_line_throw' => false,
        'trailing_comma_in_multiline' => ['elements' => ['arrays']],
        'phpdoc_separation' => true,
        'phpdoc_align' => true,
        'no_superfluous_phpdoc_tags' => true,
        'blank_line_before_statement' => [
            'statements' => ['return', 'declare', 'throw', 'try', 'yield', 'yield_from'],
        ],
        'compact_nullable_typehint' => true,
        'line_ending' => true,
        'no_extra_blank_lines' => true,
        'no_trailing_whitespace' => true,
        'no_whitespace_in_blank_line' => true,
        'single_blank_line_at_eof' => true,
        'whitespace_after_comma_in_array' => true,
    ])
    ->setFinder($finder)
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->setCacheFile(__DIR__ . '/var/cache/php-cs-fixer.cache')
    ->setUsingCache(true);
