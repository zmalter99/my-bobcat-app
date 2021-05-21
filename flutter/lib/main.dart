import 'dart:io';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:webview_flutter/webview_flutter.dart';

void main() => runApp(MaterialApp(
  debugShowCheckedModeBanner: false,
  home: WebViewApp()
));

class WebViewApp extends StatefulWidget {
  @override
  WebViewAppState createState() => WebViewAppState();
}

class WebViewAppState extends State<WebViewApp> {
  @override
  void initState() {
    super.initState();
    // Enable hybrid composition.
    if (Platform.isAndroid) WebView.platform = SurfaceAndroidWebView();

    //statusbar change
    SystemChrome.setSystemUIOverlayStyle(
      SystemUiOverlayStyle(statusBarBrightness: Brightness.dark)
    );
  }

  bool isLoading = true;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFA00000),
      body: SafeArea(
          top: true,
          bottom: false,
          child: Stack(
            children: <Widget>[
              WebView(
                initialUrl: "https://mybobcat.net/app",
                javascriptMode: JavascriptMode.unrestricted,
                onPageFinished: (finish) {
                  setState(() {
                    isLoading = false;
                  });
                }
              ),
              isLoading
                  ? Center(
                      child: CircularProgressIndicator(
                        valueColor: new AlwaysStoppedAnimation<Color>(
                            Color(0xFFA00000)),
                      ),
                    )
                  : Stack(),
            ],
          )),
    );
  }
}
