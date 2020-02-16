# phpBB Extension - marttiphpbb Custom Code

[Topic on phpBB.com](https://www.phpbb.com/community/viewtopic.php?f=456&t=2275361)

## Requirements

* phpBB 3.3+
* PHP 7.1+
* The [Codemirror helper extension](https://github.com/marttiphpbb/phpbb-ext-codemirror)
* Disabled PHP in templates (configuration option in ACP)

## Languages

I don't keep translations in my phpBB extensions anymore. The translations provided by other authors tend to go out of sync all the time. (The last version with translations of this extensions was 3.0.2).

[Galixte](https://github.com/Galixte) maintains [a french translation in his fork](https://github.com/Galixte/phpbb-ext-customcode).

## Quick Install

You can install this on the latest release of phpBB 3.3 by following the steps below:

* Create `marttiphpbb/customcode` in the `ext` directory.
* Download and unpack the repository into `ext/marttiphpbb/customcode`
* Enable `Custom Code` in the ACP at `Customise -> Manage extensions`.
* You can start editing in the ACP at `Extensions` -> `Custom Code`.

## Uninstall

* Disable `Custom Code` in the ACP at `Customise -> Extension Management -> Extensions`.
* To permanently uninstall, click `Delete Data` (the `store/customcode` directory will be removed automatically). Optionally delete the `/ext/marttiphpbb/customcode` directory.

## Support

* Report bugs and other issues to the [Issue Tracker](https://github.com/marttiphpbb/phpbb-ext-customcode/issues).

## License

[GPL-2.0](license.txt)
