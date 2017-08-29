<?php
// *********************************************************************************************************************************
//
//	fmPDA.php
//
// FM PHP Data API
//
//	Provides a 'bridge' between legacy FileMaker API For PHP code and the new REST/Data API.
//
// Not all PHP API calls are supported - only the most 'popular'. Run it against your code and see how it works.
// PHP will generate errors for methods not implemented.
//
// Objects returned do not use the same class name as FileMaker's API For PHP, so you will need to modify your code if you've been doing this.
// Note: there are two utility functions fmGetIsError() and fmGetIsValid() you can use to test for an error object or a 'good' result.
//
// Wherever you currently call:
//		$fm = new FileMaker(...)
//	Instead call:
//		$fm = new fmPDA(..., $loginLayout {, $options})
//
// Then use $fm as you have before.
//
// Additionally, the fmDataAPI class (which fmPDA derives from) can be used for direct Data API acccess - it will always return
// JSON data and you'll be expected to deal with those responses directly.
//
// Lastly: fmCURL can be instantiated to make 'raw' curl() calls that don't do any translation on the data return.
// Handy if you need to use curl() for other things in your project.
//
// Include this file to load everything necessary for fmPDA to properly execute.
//
// *********************************************************************************************************************************
//
// Copyright 2017 Mark DeNyse
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
// SOFTWARE.
//
// *********************************************************************************************************************************

require_once '_fmPDA/fmPDA.conf.php';

require_once '_fmPDA/fmUtils.inc.php';

require_once '_fmPDA/fmError.class.php';

require_once '_fmPDA/fmFindQuery.class.php';
require_once '_fmPDA/fmFindRequest.class.php';
require_once '_fmPDA/fmFindAny.class.php';

require_once '_fmPDA/fmAdd.class.php';
require_once '_fmPDA/fmEdit.class.php';
require_once '_fmPDA/fmDelete.class.php';

require_once '_fmPDA/fmResult.class.php';
require_once '_fmPDA/fmRecord.class.php';

require_once '_fmPDA/fmLayout.class.php';
require_once '_fmPDA/fmRelatedSet.class.php';
require_once '_fmPDA/fmField.class.php';

require_once '_fmPDA/fmScript.class.php';

if (USE_XML_SCRIPTING) {
// Until FM updates the Data API to allow script execution, we'll execute scripts with the old XML interface.
// Note this does *not* support script calls for pre-script, pre-command, and pre-sort.
require_once '_fmPDA/fmScriptXML.class.php';			// Use XML interface to execute a script (only needed until FM adds this to the Data API)
}

require_once 'fmPDA.class.php';


?>
