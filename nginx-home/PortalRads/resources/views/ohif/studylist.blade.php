<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />

	<meta name="description" content="Open Health Imaging Foundation DICOM Viewer" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="theme-color" content="#000000" />
	<meta http-equiv="cleartype" content="on" />
	<meta name="MobileOptimized" content="320" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!-- WEB FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet" />

	<title>OHIF Standalone Viewer</title>
</head>

<body>
	<noscript> You need to enable JavaScript to run this app. </noscript>

	<div id="root"></div>

  <script src="https://unpkg.com/@ohif/viewer@1.0.3/dist/index.umd.js" crossorigin></script>
  <script>
    var containerId = "root";
    var componentRenderedOrUpdatedCallback = function(){
      console.log('OHIF Viewer rendered/updated');
    }
    window.OHIFViewer.installViewer(
      {
      // routerBasename: '/',
      servers: {
        dicomWeb: [
          {
            name: 'ORTHANC',
            wadoUriRoot: '/ohif/wado',
            qidoRoot: '/ohif/dicom-web',
            wadoRoot: '/ohif/dicom-web',
            qidoSupportsIncludeField: true,
            imageRendering: 'wadors',
            thumbnailRendering: 'wadors',
          },
        ],
      },
    }, containerId, componentRenderedOrUpdatedCallback);
	</script>
</body>
</html>