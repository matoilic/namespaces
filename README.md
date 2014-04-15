This extension allows you to register a global namespace in fluid so that you don't have to put the declaration in every file, as this can become quite cumbersome.

In your ext_localconf.php add the following line to register a global namespace

```
\MatoIlic\Namespaces\Core\TemplateParser::registerNamespace($_EXTKEY, 'YourNamespace', 'Path\\To\\Namespace');
```

This will save you from putting

```
{namespace YourNamespace=Path\To\Namespace}
```
in every file.

If you have any questions or need support feel free to contact me through the form on my homepage http://matoilic.ch.
