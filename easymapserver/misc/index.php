<html><head>
      <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Mapserver PHP/MapScript Class Reference - Version 4.2</title><meta name="generator" content="DocBook XSL Stylesheets V1.50.0"><script xmlns="http://www.w3.org/TR/xhtml1/transitional" language="javascript" src="../javascript/include.js"></script></head><body bgcolor="white" text="black" link="#0000FF" vlink="#840084" alink="#0000FF" marginheight="0" marginwidth="0" style="&#34;margin:0px&#34;"><script xmlns="http://www.w3.org/TR/xhtml1/transitional" language="javascript">
  header("doc");
  comment();
  </script><div class="article"><div class="titlepage"><div><h1 class="title"><a name="d45e2"></a>Mapserver PHP/MapScript Class Reference - Version 4.2</h1></div><div><div class="author"><h3 class="author">Jeff McKenna</h3><div class="affiliation"><span class="orgname">DM Solutions Group Inc.<br></span><div class="address"><p>
          <tt>&lt;<a href="mailto:mckenna@dmsolutions.ca">mckenna@dmsolutions.ca</a>&gt;</tt>
        </p></div></div></div></div><div><div class="abstract"><p class="title"><b>Abstract</b></p><p>
                 This document describes all of the classes, properties and methods associated with the PHP/Mapscript
        module, and is the online version of the PHP/Mapscript README file from the Mapserver source code.  
               </p><p>README version: 1.130</p><p>Last Updated: 2004-04-19</p></div></div><hr></div><div class="toc"><p><b>Table of Contents</b></p><dl><dt><a href="#intro">Introduction</a></dt><dd><dl><dt><a href="#information">How to Get More Information on PHP/Mapscript</a></dt></dl></dd><dt><a href="#Classes">List of Classes and Functions that are Currently Implemented</a></dt><dd><dl><dt><a href="#Constants">Constants</a></dt><dt><a href="#Functions">Functions</a></dt><dt><a href="#classlist">Classes</a></dt><dd><dl><dt><a href="#ClassObj">ClassObj Class</a></dt><dt><a href="#colorobj">ColorObj Class</a></dt><dt><a href="#errorobj">ErrorObj Class</a></dt><dt><a href="#gridobj">GridObj</a></dt><dt><a href="#ImageObj">ImageObj Class</a></dt><dt><a href="#labelcache">LabelCacheObj Class</a></dt><dt><a href="#labelobj">LabelObj Class</a></dt><dt><a href="#LayerObj">LayerObj Class</a></dt><dt><a href="#legend">LegendObj Class</a></dt><dt><a href="#LineObj">LineObj Class</a></dt><dt><a href="#MapObj">MapObj Class</a></dt><dt><a href="#output_format">OutputFormatObj Class</a></dt><dt><a href="#pointobj">PointObj Class</a></dt><dt><a href="#proj">ProjectionObj Class</a></dt><dt><a href="#rectObj">RectObj Class</a></dt><dt><a href="#referenceMapObj">ReferenceMapObj Class</a></dt><dt><a href="#result">ResultCacheMemberObj Class</a></dt><dt><a href="#scale">ScalebarObj Class</a></dt><dt><a href="#shapefileObj">ShapefileObj Class</a></dt><dt><a href="#ShapeObj">ShapeObj Class</a></dt><dt><a href="#style">StyleObj Class</a></dt><dt><a href="#symbolobj">symbolObj Class</a></dt><dt><a href="#webobj">WebObj Class</a></dt></dl></dd></dl></dd><dt><a href="#docinfo">About This Document</a></dt><dd><dl><dt><a href="#copyright">Copyright Information</a></dt><dt><a href="#disclaimer">Disclaimer</a></dt><dt><a href="#feedback">Feedback</a></dt></dl></dd></dl></div><div class="sect1"><div class="titlepage"><div><h2 class="title"><a name="intro"></a>Introduction</h2></div></div><p>
    PHP MapScript was originally developed for PHP-3.0.14 but after MapServer
    3.5 support for PHP3 has been dropped and as of the last update of this
    document, PHP 4.1.2 or more recent was required.
          </p><p>
      The module has been tested and used on Linux, Solaris, *BSD, and WinNT.
    </p><p>
      This module is constantly under development.
    </p><div class="sect2"><div class="titlepage"><div><h3 class="title"><a name="information"></a>How to Get More Information on PHP/Mapscript</h3></div></div><div class="itemizedlist"><ul type="disc"><li><p>
              The main resource for help is the PHP/MapScript web                         page at: <a href="http://www.maptools.org/php_mapscript/" target="_top">                       http://www.maptools.org/php_mapscript/</a>.
          </p></li><li><p>
            See also the MapServer Wiki for links to more information on this module:
              <a href="http://mapserver.gis.umn.edu/cgi-bin/wiki.pl?PHPMapScript" target="_top">http://mapserver.gis.umn.edu/cgi-bin/wiki.pl?PHPMapScript</a>
          </p></li><li><p>
            For installation questions regarding the PHP/Mapscript module, see the <a href="http://mapserver.gis.umn.edu/doc/phpmapscript-install-howto.html" target="_top">PHP/Mapscript Installation HOWTO</a>.
          </p></li><li><p>
                        Also, see the Mapserver MapScript documentation at:
               <a href="http://mapserver.gis.umn.edu/doc/perlmapscript-reference.html" target="_top">http://mapserver.gis.umn.edu/doc/perlmapscript-reference.html</a>
                        and the MapServer MapFile documentation at:
                  <a href="http://mapserver.gis.umn.edu/doc/mapfile-reference.html" target="_top">http://mapserver.gis.umn.edu/doc/mapfile-reference.html</a>.  
                  </p></li><li><p>
            The main PHP site for documentation is at: <a href="http://www.php.net/" target="_top">http://www.php.net/             </a>.
          </p></li></ul></div></div></div><div class="sect1"><div class="titlepage"><div><h2 class="title"><a name="Classes"></a>List of Classes and Functions that are Currently Implemented</h2></div></div><div class="important" style="margin-left: 0.5in; margin-right: 0.5in;"><h3 class="title">Important</h3><div class="itemizedlist"><ul type="disc"><li><p>
            Constant names and class member variable names are case-sensitive in PHP.
          </p></li><li><p>
            Several MapScript functions (all those that access files in the back end
                such as ms_newMapObj(), drawMap(), etc.) will affect the value of the 
                current working directory (CWD) in the PHP environment. This will be 
                fixed eventually but in the meantime you should be careful about these 
                side-effects.
          </p></li></ul></div></div><div class="sect2"><div class="titlepage"><div><h3 class="title"><a name="Constants"></a>Constants</h3></div></div><p>
        The following Mapserver constants are available:
      </p><pre class="programlisting">
    Boolean values:
    MS_TRUE, MS_FALSE, MS_ON, MS_OFF, MS_YES, MS_NO

    Map units:
  MS_INCHES, MS_FEET, MS_MILES, MS_METERS, MS_KILOMETERS, MS_DD,
        MS_PIXELS

    Layer types:
        MS_LAYER_POINT, MS_LAYER_LINE, MS_LAYER_POLYGON, 
        MS_LAYER_RASTER, MS_LAYER_ANNOTATION, MS_LAYER_QUERY,
        MS_LAYER_CIRCLE  MS_LAYER_TILEINDEX

    Layer/Legend/Scalebar/Class Status:
        MS_ON, MS_OFF, MS_DEFAULT, MS_EMBED, MS_DELETE

    Font types:
        MS_TRUETYPE, MS_BITMAP

    Label positions:
        MS_UL, MS_LR, MS_UR, MS_LL, MS_CR, MS_CL, MS_UC, MS_LC,
        MS_CC, MS_AUTO, MS_XY

    Bitmap font styles:
        MS_TINY , MS_SMALL, MS_MEDIUM, MS_LARGE, MS_GIANT

    Shape types:
        MS_SHAPE_POINT, MS_SHAPE_LINE, MS_SHAPE_POLYGON, MS_SHAPE_NULL

    Shapefile types:
        MS_SHP_POINT, MS_SHP_ARC, MS_SHP_POLYGON, MS_SHP_MULTIPOINT

    Query/join types:
        MS_SINGLE, MS_MULTIPLE

    Querymap styles:
        MS_NORMAL, MS_HILITE, MS_SELECTED

    Connection Types:
        MS_INLINE, MS_SHAPEFILE, MS_TILED_SHAPEFILE, MS_SDE, MS_OGR, 
        MS_TILED_OGR, MS_POSTGIS, MS_WMS, MS_ORACLESPATIAL, MS_WFS,
        MS_GRATICULE, MS_MYGIS

    Error codes:
        MS_NOERR, MS_IOERR, MS_MEMERR, MS_TYPEERR, MS_SYMERR, 
        MS_REGEXERR, MS_TTFERR, MS_DBFERR, MS_GDERR, MS_IDENTERR, 
        MS_EOFERR, MS_PROJERR, MS_MISCERR, MS_CGIERR, MS_WEBERR, 
        MS_IMGERR, MS_HASHERR, MS_JOINERR, MS_NOTFOUND, MS_SHPERR, 
        MS_PARSEERR, MS_SDEERR, MS_OGRERR, MS_QUERYERR, MS_WMSERR, 
        MS_WMSCONNERR, MS_ORACLESPATIALERR, MS_WFSERR, MS_WFSCONNERR, 
        MS_MAPCONTEXTERR, MS_HTTPERR

    Symbol types:
        MS_SYMBOL_SIMPLE,  MS_SYMBOL_VECTOR, MS_SYMBOL_ELLIPSE,
        MS_SYMBOL_PIXMAP, MS_SYMBOL_TRUETYPE, MS_SYMBOL_CARTOLINE
      </pre></div><div class="sect2"><div class="titlepage"><div><h3 class="title"><a name="Functions"></a>Functions</h3></div></div><pre class="programlisting">
   string ms_GetVersion()
        Returns the MapServer version and options in a string.  This string
        can be parsed to find out which modules were compiled in, etc.

   array ms_TokenizeMap(string map_file_name)
        Preparses a mapfile through the MapServer parser and return an 
        array with one item for each token from the mapfile.  Strings, 
        logical expressions, regex expressions and comments are returned
        as individual tokens.
      </pre></div><div class="sect2"><div class="titlepage"><div><h3 class="title"><a name="classlist"></a>Classes</h3></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="ClassObj"></a>ClassObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Class_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   Class Objects can be returned by the LayerObj class, or can be created
   using:

   classObj ms_newClassObj(layerObj layer, classObj class)

  The second argument class is optional. If given, the new class
  created will be a copy of this class.
                    </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Class_members"></a>Members:</h5></div></div><pre class="programlisting">
   string name
   string title
   int    type
   int    status      (MS_ON, MS_OFF or MS_DELETE)
   double minscale
   double maxscale
   string template
   labelObj label
   int    numstyles
                 </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Class_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.

   int setexpression(string expression)
        Set the expression string for the class object.
   
   char getexpression(string expression)
        Returns the expression string for the class object.
            
   int settext(string text)
        Set the text string for the class object.
   
   int drawLegendIcon(int width, int height, imageObj im, int dstX, int dstY)
        Draw the legend icon on im object at dstX, dstY.
        Returns MS_SUCCESS/MS_FAILURE.

   imageObj createLegendIcon(int width, int height)
        Draw the legend icon and return a new imageObj.
     
   styleObj getStyle(int index)
        Return the style object using an index. index &gt;= 0 &amp;&amp;
        index &lt; class-&gt;numstyles.

   classObj clone()
        Returns a cloned copy of the class.  

   int movestyleup(int index)
       The style specified by the style index will be moved up into
       the array of classes. Returns MS_SUCCESS or MS_FAILURE.
       ex calss-&gt;movestyleup(1) will have the effect of moving style 1
          up to postion 0, and the style at position 0 will be moved
          to position 1.
 
   int movestyledown(int index)
       The style specified by the style index will be moved down into
       the array of classes. Returns MS_SUCCESS or MS_FAILURE.
       ex class-&gt;movestyledown(0) will have the effect of moving style 0
          up to postion 1, and the style at position 1 will be moved
          to position 0.

   int deletestyle(int index)
       Delete the style specified by the style index. If there are any
       style that follow the deleted style, their index will decrease by 1.

       NOTE : if you are using the numstyles parameter while using the deletestyle
              function on the class object you need to refetch a new class
              object. Example :
              
                 //class has 2 styles
                $class = $oLayer-&gt;getclass(0);
                $class-&gt;deletestyle(1);
                echo $class-&gt;numstyles; : will echo 2

                $class = $oLayer-&gt;getclass(0);
                echo $class-&gt;numstyles; : will echo 1 
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="colorobj"></a>ColorObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="col_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
  Instances of ColorObj are always embedded inside other classes.
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="col_members"></a>Members:</h5></div></div><pre class="programlisting">
   int    red
   int    green
   int    blue
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="col_methods"></a>Method:</h5></div></div><pre class="programlisting">
   void setRGB(int red, int green, int blue)
        Set red, green, blue values.
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="errorobj"></a>ErrorObj Class</h4></div></div><p>
   Instances of errorObj are created internally by MapServer as errors
   happen.  Errors are managed as a chained list with the first item being
   the most recent error.  The head of the list can be fetched using 
   ms_GetErrorObj(), and the list can be cleared using ms_ResetErrorList()     
      </p><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="error_functions"></a>Functions:</h5></div></div><pre class="programlisting">
   errorObj ms_GetErrorObj()
        Returns a reference to the head of the list of errorObj.

   void ms_ResetErrorList()
        Clear the current error list.  
        Note that clearing the list invalidates any errorObj handles obtained 
        via the $error-&gt;next() method.     
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="error_members"></a>Members:</h5></div></div><pre class="programlisting">
   int      code      /* See error code constants above */
   string   routine
   string   message
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="error_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   errorObj next()
        Returns the next errorObj in the list, or NULL if we reached the end
        of the list.      
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="error_example"></a>Example:</h5></div></div><pre class="programlisting">
   This example draws a map and reports all errors generated during
   the draw() call, errors can potentially come from multiple layers.

       ms_ResetErrorList();
       $img = $map-&gt;draw();
       $error = ms_GetErrorObj();
       while($error &amp;&amp; $error-&gt;code != MS_NOERR)
       {
           printf("Error in %s: %s&lt;br&gt;\n", $error-&gt;routine, $error-&gt;message);
           $error = $error-&gt;next();
       }        
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="gridobj"></a>GridObj</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="grid_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   The grid is always embedded inside a layer object defined as
   a grid (layer-&gt;connectiontype = MS_GRATICULE)
   (for more docs : http://mapserver.gis.umn.edu/cgi-bin/wiki.pl?MapServerGrid)

   A layer can become a grid layer by adding a grid object to it using :
      ms_newGridObj(layerObj layer)

  Example :   $oLayer = ms_newlayerobj($oMap);
              $oLayer-&gt;set("name", "GRID");
              ms_newgridobj($oLayer);
              $oLayer-&gt;grid-&gt;set("labelformat", "DDMMSS");     
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="grid_members"></a>Members:</h5></div></div><pre class="programlisting">
   double    minsubdivide;
   double    maxsubdivide;
   double    minarcs;
   double    maxacrs;
   double    mininterval;
   double    maxinterval;
   string    labelformat;     
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="grid_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   int set(string property_name, new_value)
        Set object property to a new value.   
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="ImageObj"></a>ImageObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Img_contructor"></a>Constructor:</h5></div></div><pre class="programlisting">
Instances of ImageObj are always created by the map class methods.
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Img_members"></a>Members:</h5></div></div><pre class="programlisting">
   int    width     (read-only)
   int    height    (read-only)
   string imagepath
   string imageurl    
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Img_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   void free()
        Destroys resources used by an image object.

   int saveImage(string filename)
        Writes image object to specifed filename.
        Passing an empty filename sends output to stdout.  In this case,
        the PHP header() function should be used to set the documents's
        content-type prior to calling saveImage().
        The output format is the one that is currently selected in the 
        map file.
        The function returns -1 on error.  On success, it returns either 0
        if writing to an external file, or the number of bytes written if 
        output is sent to stdout.

   string saveWebImage()
        Writes image to temp directory.  Returns image URL.
        The output format is the one that is currently selected in the 
        map file.
       

   void pasteImage(imageObj srcImg, int transparentColorHex 
                   [[, int dstX, int dstY], int angle])
        Copy srcImg on top of the current imageObj.
        transparentColorHex is the color (in 0xrrggbb format) from srcImg 
        that should be considered transparent (i.e. those pixels won't 
        be copied).  Pass -1 if you don't want any transparent color.
        If optional dstx,dsty are provided then it defines the position 
        where the image should be copied (dstx,dsty = top-left corner 
        position).
        The optional angle is a value between 0 and 360 degrees to rotate
        the source image counterclockwise.  Note that if an angle is specified
        (even if its value is zero) then the dstx and dsty coordinates 
        specify the CENTER of the destination area.
        Note: this function works only with 8 bits GD images (PNG or GIF).  
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="labelcache"></a>LabelCacheObj Class</h4></div></div><p>
Accessible only through the map object (map-&gt;labelcache). This object
is only used to give the possiblity to free the label cache 
(map-&gt;labelcache-&gt;free())       
      </p><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="labelcache_method"></a>Methods:</h5></div></div><pre class="programlisting">
   boolean free()
        Free the label cache. Returns true on success or false if an error
        occurs.
        Ex : (map-&gt;labelcache-&gt;free();        
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="labelobj"></a>LabelObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Lab_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   LabelObj are always embedded inside other classes.
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Lab_members"></a>Members:</h5></div></div><pre class="programlisting">
   string font
   int    type
   colorObj    color
   colorObj    outlinecolor
   colorObj    shadowcolor
   int    shadowsizex
   int    shadowsizey
   colorObj    backgroundcolor
   colorObj    backgroundshadowcolor
   int    backgroundshadowsizex
   int    backgroundshadowsizey
   int    size
   int    minsize
   int    maxsize
   int    position
   int    offsetx
   int    offsety
   double angle
   int    autoangle
   int    buffer
   int    antialias
   int    wrap
   int    minfeaturesize
   int    autominfeaturesize
   int    mindistance
   int    partials
   int    force 
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Lab_methods"></a>Method:</h5></div></div><pre class="programlisting">
   int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.    
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="LayerObj"></a>LayerObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   Layer Objects can be returned by the MapObj class, or can be created
   using:

   layerObj ms_newLayerObj(MapObj map, layerObj layer)

   A second argument (which is not manadatory) can be given to the  ms_newLayerObj
   to be able to create a new layer based on an existing layer. If a layer is 
   given as argument, all members of a this layer will be copied in the new
   layer created.
               </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Lay_members"></a>Members:</h5></div></div><pre class="programlisting">
   int    numclasses  (read-only)
   int    index       (read-only)
   int    status      (MS_ON, MS_OFF, MS_DEFAULT or MS_DELETE)
   int    debug
   string classitem
   string name
   string group
   string data
   int    type
   int    dump
   double tolerance
   int    toleranceunits
   double symbolscale
   double minscale
   double maxscale
   double labelminscale
   double labelmaxscale
   int    maxfeatures
   colorObj    offsite
   int    annotate
   int    transform
   int    labelcache
   int    postlabelcache
   string labelitem
   string labelsizeitem
   string labelangleitem
   string tileitem
   string tileindex
   string header
   string footer
   string connection
   int    connectiontype
   string filteritem
   string template
   string styleitem
   gridObj grid //only available on a layer defined as grid (MS_GRATICULE)
   int num_processing
      </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Lay_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.

   int draw(imageObj image)
        Draw a single layer, add labels to cache if required. 
        Returns -1 on error.

   int drawQuery(imageObj image)
        Draw query map for a single layer.

   classObj getClass(int classIndex)
        Returns a classObj from the layer given an index value (0=first class)

   int queryByPoint(pointObj point, int mode, double buffer)
        Query layer at point location specified in georeferenced map 
        coordinates (i.e. not pixels).  
        The query is performed on all the shapes that are part of a CLASS 
        that contains a TEMPLATE value or that match any class in a
        layer that contains a LAYER TEMPLATE value.
        Mode is MS_SINGLE or MS_MULTIPLE depending on number of results
        you want. 
        Passing buffer &lt;=0 defaults to tolerances set in the map file 
        (in pixels) but you can use a constant buffer (specified in 
        ground units) instead.
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int queryByRect(rectObj rect)
        Query layer using a rectangle specified in georeferenced map 
        coordinates (i.e. not pixels).
        The query is performed on all the shapes that are part of a CLASS 
        that contains a TEMPLATE value or that match any class in a
        layer that contains a LAYER TEMPLATE value.
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int queryByShape(shapeObj shape)
        Query layer based on a single shape, the shape has to be a polygon
        at this point.
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int queryByFeatures(int slayer) 
        Perform a query set based on a previous set of results from
        another layer. At present the results MUST be based on a polygon
        layer.
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int queryByAttributes(string qitem, string qstring, int mode)
        Query layer for shapes that intersect current map extents.
        qitem is the item (attribute) on which the query is performed, 
        and qstring is the expression to match.
        The query is performed on all the shapes that are part of a CLASS 
        that contains a TEMPLATE value or that match any class in a
        layer that contains a LAYER TEMPLATE value.  
        Note that the layer's FILTER/FILTERITEM are ignored by this function.
        Mode is MS_SINGLE or MS_MULTIPLE depending on number of results
        you want. 
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int setFilter(string expression)
        Set layer filter expression.

   char getProjection()
        Returns a string represenation of the projection. If no 
        projection is set, MS_FALSE is returned.

   int setProjection(string proj_params)
        Set layer projection and coordinate system.  Parameters are given as 
        a single string of comma-delimited PROJ.4 parameters.

   int setWKTProjection(string proj_params)
        Same as setProjection(), but takes an OGC WKT projection 
        definition string as input.

   int getNumResults()
        Returns the number of results from this layer in the last query.

   resultCacheMemberObj getResult(int index)
        Returns a resultCacheMemberObj by index from a layer object with 
        index in the range 0 to numresults-1.  
        Returns a valid object or FALSE(0) if index is invalid.

   int open()
        Open the layer for use with getShape().  
        Returns MS_SUCCESS/MS_FAILURE.

   void close()
        Close layer previously opened with open().

   shapeObj getShape(int tileindex, int shapeindex)
        Retrieve shapeObj from a layer by index.
        Tileindex is used only for tiled shapefiles (you get it from the
        resultCacheMemberObj returned by getResult() for instance).
        Simply pass tileindex = -1 for other data sources.

   int addFeature(shapeObj shape)
        Add a new feature in a layer.  Returns -1 on error.

   int getMetaData(string name)
        Fetch layer metadata entry by name.  Returns "" if no entry 
        matches the name.  Note that the search is case sensitive.

   int setMetaData(string name, string value)
        Set a metadata entry for the layer.  Returns MS_SUCCESS/MS_FAILURE.

   int removeMetaData(string name)
        Remove a metadata entry for the layer.  Returns MS_SUCCESS/MS_FAILURE.

   int getWMSFeatureInfoURL(int clickX, int clickY, int featureCount, 
                            string infoFormat)
        Return a WMS GetFeatureInfo URL (works only for WMS layers)
        clickX, clickY is the location of to query in pixel coordinates
        with (0,0) at the top left of the image.
        featureCount is the number of results to return.
        infoFormat is the format the format in which the result should be
        requested.  Depends on remote server's capabilities.  MapServer
        WMS servers support only "MIME" (and should support "GML.1" soon).
        Returns "" and outputs a warning if layer is not a WMS layer 
        or if it is not queriable.
        
   char ** getItems()
        return a list of items. Must call open function first.

   boolean setProcessing(string)
        Add the string to the processing string list for the layer.
        The layer-&gt;num_processing is incremented by 1.
        Ex : $oLayer-&gt;setprocessing("SCALE_1=AUTO");
             $oLayer-&gt;setprocessing("SCALE_2=AUTO");       

   aString getProcessing()
        Returns an array containing the processing strings

   boolean clearProcessing()
        Clears all the processing strings

   string   executeWFSGetfeature()
       Executes a GetFeature request on a WFS layer and returns the
       name of the temporary GML file created. Returns an empty
       string on error.

   int applySLD(string sldxml, string namedlayer)
        Apply the SLD document to the layer object. 
        The matching between the sld document and the layer will be done 
        using the layer's name.
        If a namedlayer argument is passed (argument is optional), 
        the NamedLayer in the sld that matchs it will be used to style 
        the layer.
        See SLD How to for more information on the SLD support.

  int applySLDURL(string sldurl, string namedlayer)
        Apply the SLD document pointed by the URL to the layer object. The 
        matching between the sld document and the layer will be done using 
        the layer's name.
        If a namedlayer argument is passed (argument is optional), 
        the NamedLayer in the sld that matchs it will be used to style 
        the layer.
        See SLD How to for more information on the SLD support.

  char generateSLD()
        Returns an SLD XML string based on all the classes found in the layers.

 int moveclassup(int index)
       The class specified by the class index will be moved up into
       the array of layers. Returns MS_SUCCESS or MS_FAILURE.
       ex layer-&gt;moveclassup(1) will have the effect of moving class 1
          up to postion 0, and the class at position 0 will be moved
          to position 1.

 int moveclassdown(int index)
       The class specified by the class index will be moved down into
       the array of layers. Returns MS_SUCCESS or MS_FAILURE.
       ex layer-&gt;moveclassdown(0) will have the effect of moving class 0
          up to postion 1, and the class at position 1 will be moved
          to position 0.
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="legend"></a>LegendObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="leg_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
  Instances of legendObj are always are always embedded inside the mapObj.  
          </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="leg_members"></a>Members:</h5></div></div><pre class="programlisting">
   int height;
   int width;
   int keysizex;      
   int keysizey;
   int keyspacingx;
   int keyspacingy;
   colorObj outlinecolor; //Color of outline of box, -1 for no outline
   int status; //MS_ON, MS_OFF, MS_EMBED
   int position; //for embeded legends, MS_UL, MS_UC, ...
   int transparent;
   int interlace;
   int postlabelcache; //MS_TRUE, MS_FALSE
   labelObj label;
   colorObj imagecolor;
   string   template
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="leg_methods"></a>Methods:</h5></div></div><pre class="programlisting">
      int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="LineObj"></a>LineObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="line_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
LineObj ms_newLineObj()   
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="line_members"></a>Members:</h5></div></div><pre class="programlisting">
  int    numpoints  (read-only)    
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="line_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   int add(pointObj point)
        Add a point to the end of line.

   int addXY(double x, double y [, double m])
        Add a point to the end of line.
        Note : the 3rd parameter m is used for measured shape files only. 
        It is not mandatory.

   PointObj point(int i)
        Returns a reference to point number i.  Reference is valid only
        during the life of the lineObj that contains the point.

   int project(projectionObj in, projectionObj out)
        Project the line from "in" projection (1st argument) to "out" 
        projection (2nd argument).  Returns MS_SUCCESS/MS_FAILURE.

   void free()
        Destroys resources used by a line object.    
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="MapObj"></a>MapObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   mapObj ms_newMapObj(string map_file_name [, string new_map_path])
        Returns a new object to deal with a MapServer map file.

        By default, the SYMBOLSET, FONTSET, and other paths in the mapfile
        are relative to the mapfile location.  If new_map_path is provided
        then this directory will be used as the base path for all the 
        relative paths inside the mapfile.
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Members"></a>Members:</h5></div></div><pre class="programlisting">
   int          numlayers  (read-only)
   string       name
   int          status
   int          debug
   int          width
   int          height
   int          maxsize
   int          transparent
   int          interlace
   int          imagetype  (read-only, use selectOutputformat())
   int          imagequality
   double       resolution   (pixels per inch, defaults to 72)
   rectObj      extent; 
   double       cellsize
   int          units (map units type)
   double       scale (read-only, set by drawMap())
   string       shapepath
   int          keysizex
   int          keysizey
   int          keyspacingx
   int          keyspacingy
   webObj       web
   referenceMapObj reference
   colorObj     imagecolor
   scalebarObj  scalebar
   legendObj    legend                  
   string       symbolsetfilename (read-only, set by setSymbolSet())
   string       fontsetfilename (read-only, set by setFontSet())
   outputformatObj outputformat (read only)   
   labelcacheObj labelcache (no memebers. Used only to be able to free the
                             the label cache (ex : map-&gt;labelcache-&gt;free())
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="Methods"></a>Methods:</h5></div></div><pre class="programlisting">
   mapObj clone()
        Returns a handle to a new mapObj which is a clone of the current
        mapObj.  All parameters in the current mapObj are copied to the
        new mapObj.  Returns NULL (0) on error.

   int set(string property_name, new_value)
        Set map object property to new value. Returns -1 on error.

   int getsymbolbyname(string symbol_name)  
        Returns the symbol index using the name.

   symbol getsymbolobjectbyid(int symbolid)
        Returns the symbol object using a symbol id. Refer to
        the symbol object reference section for more details.

   void preparequery()
        Calculate the scale of the map and assign it to the map-&gt;scale.
             
   imageObj prepareImage()
        Return handle on blank image object.

   imageObj draw()
        Render map and return handle on image object.

   imageObj drawQuery()
        Render a query map and return handle on image object.

   imageObj drawLegend()
        Render legend and return handle on image object.

   imageObj drawReferenceMap()
        Render reference map and return handle on image object.

   imageObj drawScaleBar()
        Render scale bar and return handle on image object.

   int embedlegend(imageObj image) 
        embeds a legend. Actually the legend is just added to the label 
        cache so you must invoke drawLabelCache() to actually do the 
        rendering (unless postlabelcache is set in which case it is 
        drawn right away).

   int embedScalebar(imageObj image) 
        embeds a scalebar. Actually the scalebar is just added to the label 
        cache so you must invoke drawLabelCache() to actually do the rendering 
        (unless postlabelcache is set in which case it is drawn right away).

   int drawLabelCache(imageObj image)
        Renders the labels for a map. Returns -1 on error.

   layerObj getLayer(int index)
        Returns a layerObj from the map given an index value (0=first layer)

   layerObj getLayerByName(string layer_name)
        Returns a layerObj from the map given a layer name.  
        Returns FALSE if layer doesn't exist.

   colorObj getcolorbyindex(int iCloIndex)
  Returns a colorObj corresponding to the color index in the palette

   void setextent(double minx, double miny, double maxx, double maxy)
  Set the map extents using the georef extents passed in argument.

   void zoompoint(int nZoomFactor, pointObj oPixelPos, int nImageWidth, 
                  int nImageHeight, rectObj oGeorefExt)

  Zoom to a given XY postion;

  Parmeters are :                                                 
       - Zoom factor : positive values do zoom in, negative values  
                      zoom out. Factor of 1 will recenter.           
       - Pixel position (pointObj) : x, y coordinates of the click, 
                                     with (0,0) at the top-left
       - Width : width in pixel of the current image.                 
       - Height : Height in pixel of the current image.               
       - Georef extent (rectObj) : current georef extents.            
       - MaxGeoref extent (rectObj) : (optional) maximum georef extents.
         If provided then it will be impossible to zoom/pan outside of
         those extents.

   void zoomrectangle(rectObj oPixelExt, int nImageWidth, int nImageHeight,
         rectObj oGeorefExt)
  Set the map extents to a given extents.
  
  Parmeters are :
  - oPixelExt (rect object) : Pixel Extents, with (0,0) at the top-left
          The rectangle contains the coordinates of the LL and UR coordinates
          in pixel. (the maxy in the rect object should be &lt; miny value)
          
          ------- UR (values in the rect object : maxx, maxy)
          |     | 
          |     |
          |     |
          ------
        LL (values in the rectobject minx, miny)                      
         
        - Width : width in pixel of the current image.
        - Height : Height in pixel of the current image. 
        - Georef extent (rectObj) : current georef extents.

   void zoomscale(double nScale, pointObj oPixelPos, int nImageWidth, 
                  int nImageHeight, rectObj oGeorefExt)

  Zoom in or out to a given XY position so that the map is displayed
        at specified scale.

  Parmeters are :                                                 
       - Scale : Scale at which the map should be displayed.
       - Pixel position (pointObj) : x, y coordinates of the click, 
                                     with (0,0) at the top-left
       - Width : width in pixel of the current image.                 
       - Height : Height in pixel of the current image.               
       - Georef extent (rectObj) : current georef extents.            
       - MaxGeoref extent (rectObj) : (optional) maximum georef extents.
         If provided then it will be impossible to zoom/pan outside of
         those extents.

   int queryByPoint(pointObj point, int mode, double buffer)
        Query all selected layers in map at point location specified in 
        georeferenced map coordinates (i.e. not pixels).  
        The query is performed on all the shapes that are part of a CLASS 
        that contains a TEMPLATE value or that match any class in a
        layer that contains a LAYER TEMPLATE value.
        Mode is MS_SINGLE or MS_MULTIPLE depending on number of results
        you want. 
        Passing buffer &lt;=0 defaults to tolerances set in the map file 
        (in pixels) but you can use a constant buffer (specified in 
        ground units) instead.
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int queryByRect(rectObj rect)
        Query all selected layers in map using a rectangle specified in 
        georeferenced map coordinates (i.e. not pixels).
        The query is performed on all the shapes that are part of a CLASS 
        that contains a TEMPLATE value or that match any class in a
        layer that contains a LAYER TEMPLATE value.
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int queryByShape(shapeObj shape)
        Query all selected layers in map based on a single shape, the 
        shape has to be a polygon at this point.
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int queryByFeatures(int slayer) 
        Perform a query based on a previous set of results from
        a layer. At present the results MUST be based on a polygon layer.
        Returns MS_SUCCESS if shapes were found or MS_FAILURE if nothing
        was found or if some other error happened (note that the error 
        message in case nothing was found can be avoided in PHP using 
        the '@' control operator).

   int queryByIndex(layerindex, tileindex, shapeindex, addtoquery)
        Add a specific shape on a given layer to the query result.
        If addtoquery (which is a non mandatory argument) is set to MS_TRUE,
        the shape will be added to the existing query list. Default behavaior
        is to free the existing query list and add only the new shape.

   int savequery(filename)
        Save the current query in a file. Returns MS_SUCESS or MS_FAILURE.
        Can be used with loadquery

   int loadquery(filename)
        Loads a query from a file. Returns MS_SUCESS or MS_FAILURE.
        To be used with savequery.

   void freequery(layerindex)
        Frees the query result on a specified layer. If the layerindex is -1,
        all queries on layers will be freed.

   int save(string filename)
        Save current map object state to a file. Returns -1 on error.
        Use absolute path. If a relative path is used, then it will be 
        relative to the mapfile location.

   char getProjection()
        Returns a string represenation of the projection. If no 
        projection is set, MS_FALSE is returned.

   int setProjection(string proj_params, boolean bSetUnitsAndExtents)
        Set map projection and coordinate system.  Parameters are given as 
        a single string of comma-delimited PROJ.4 parameters.
        The argument : bSetUnitsAndExtents is used to automatically update
        the map units and extents based on the new projection. Possible 
        values are MS_TRUE and MS_FALSE. By defualt it is set at MS_FALSE

   int setWKTProjection(string proj_params, boolean bSetUnitsAndExtents)
        Same as setProjection(), but takes an OGC WKT projection 
        definition string as input.

   int getMetaData(string name)
        Fetch metadata entry by name (stored in the WEB object in the map
        file).  Returns "" if no entry matches the name.  Note that the
        search is case sensitive.

   int setMetaData(string name, string value)
        Set a metadata entry for the map (stored in the WEB object in the map
        file).  Returns MS_SUCCESS/MS_FAILURE.

   int removeMetaData(string name)
        Remove a metadata entry for the map (stored in the WEB object in the map
        file).  Returns MS_SUCCESS/MS_FAILURE.

   array getLayersIndexByGroup(string groupname)
        Return an array containing all the layer's indexes given
        a group name.

   array getAllGroupNames()
        Return an array containing all the group names used in the
        layers.  

   array getAllLayerNames()
        Return an array containing all the layer names.

   boolean moveLayerUp(int layerindex)
        Move layer up in the hierarcy of drawing. 

   boolean moveLayerDown(int layerindex)
        Move layer down in the hierarcy of drawing.

   array   getlayersdrawingorder()
        Return an array containing layer's index in the order which they
        are drawn.

   boolean  setlayersdrawingorder(array layeryindex)
        Set the layer's order array. The argument passed must be a valid
        array with all the layer's index. 
        Return TRUE on success or else FALSE.

   char *processtemplate(array params, boolean generateimages)
        Process the template file specified in the web object and return 
        the resut in a buffer. 
        The processing consists of opening the template file and replace
        all the tags found in it.
        Only tags that have an equivalent element in the map object are
        replaced (ex [scale]). 
        The are two expetions to the previous statement :
          - [img], [scalebar], [ref], [legend] would be replaced with the 
            appropriate url if the parameter generateimages is set to 
            MS_TRUE. (Note :  the images corresponding to the diffrent objects 
            are generated if the object is set to MS_ON in the map file)
         - the user can use the params parameter to specify tags and 
           their values. For example if the user have a specific tag call
           [my_tag] and would like it to be replaced by "value_of_my_tag"
           he would do :
              $tmparray["my_tag"] = "value_of_my_tag";
              $map-&gt;processtemplate($tmparray, MS_FASLE);
         
   char *processquerytemplate(array params, boolean generateimages)     
       Process query template files and return the resut in a buffer.
       Second argument generateimages is not manadatory. If not given
        It will be set to TRUE.

       See also : processtemplate function.
   
   char *processlegendtemplate(array params)     
       Process legend template files and return the resut in a buffer.

     See also : processtemplate function.

   int setSymbolSet(string fileName)
       Load and set a symbol file dynamictly.
       
   int getNumSymbols()
       Return the number of symbols in map.
       
   int setFontSet(string fileName)
       Load and set a new fontset.
       

   int selectOutputFormat(string type)
        Selects the output format to be used in the map. 
        Returns MS_SUCCESS/MS_FAILURE.
       
        Note : the type used should correspond to one of the output
               formats declared in the map file.
               The type argument passed is compared with the mimetype
               parameter in the output format structure and then to
               the name parameter in the structure. 

   int saveMapContext(string filename)
        Available only if WMS support is enabled.
        Save current map object state in WMS Map Context format. 
        Only WMS layers are saved in the WMS Map Context XML file.
        Returns MS_SUCCESS/MS_FAILURE.

   int loadMapContext(string filename)
        Available only if WMS support is enabled.
        Load a WMS Map Context XML file into the current mapObj.
        If the map already contains some layers then the layers defined
        in the WMS Map context document are added to the current map.
        Returns MS_SUCCESS/MS_FAILURE.


  int applySLD(string sldxml)
        Apply the SLD document to the map file. The matching between the
        sld document and the map file will be done using the layer's name.
        See SLD How to for more information on the SLD support.

  int applySLDURL(string sldurl)
        Apply the SLD document pointed by the URL to the map file. The matching between the
        sld document and the map file will be done using the layer's name.
        See SLD How to for more information on the SLD support.

  char generateSLD()
        Returns an SLD XML string based on all the classes found in all the layers.
          </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="output_format"></a>OutputFormatObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="format_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
  Instance of outputformatObj is always embedded inside the mapObj.
  It is uses a read only.

  No constructor available       
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="format_members"></a>Members:</h5></div></div><pre class="programlisting">
   string    name;
   string    mimetype;
   string    driver;
   string    extension;
   int       renderer;
   int       imagemode     
   int       transparent      
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="format_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   void setformatoption(string property_name, new_value)
        Add or Modify the format option list. return true on success.

    Example : $oMap-&gt;outputformat-&gt;setformatoption("OUTPUT_TYPE", "RASTER");
     
   string  getformatoption(string property_name)
        Returns the associated value for the format option property passed
        as argument. Returns an empty string if property not found.   
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="pointobj"></a>PointObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="pt_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
PointObj ms_newPointObj()
           </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="pt_members"></a>Members:</h5></div></div><pre class="programlisting">
   double x
   double y
   double m  (used only for measured shape files. set to 0 for other types.)
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="pt_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   int setXY(double x, double y [, double m])
        Set X,Y coordinate values.
        Note : the 3rd parameter m is used for measured shape files only.
        It is not mandatory.
        Returns 0 on success, -1 on error.

   int draw(mapObj map, layerObj layer, imageObj img, 
            int class_index, string text)
        Draws the individual point using layer.  The class_index is used
        to classify the point based on the classes defined for the layer.
        The text string is used to annotate the point.
        Returns MS_SUCCESS/MS_FAILURE.

  double distanceToPoint(pointObj poPoint)
       Calculates distance between two points.  

  double distanceToLine(pointObject p1, pointObject p2)
        Calculates distance between a point ad a lined defined by the
        two points passed in argument. 

  double distanceToShape(shapeObj shape)
        Calculates the minimum distance between a point and a shape.

  int project(projectionObj in, projectionObj out)
        Project the point from "in" projection (1st argument) to "out" 
        projection (2nd argument).  Returns MS_SUCCESS/MS_FAILURE.
      
  void free()
       Releases all resources used by the object.   
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="proj"></a>ProjectionObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="proj_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
  ProjectionObjObj ms_newprojectionobj(string projectionstring)
        </pre><p>
   Creates a projection object based on the projection string passed
   as argument.
        </p><p>
   Eg : $projInObj = ms_newprojectionobj("proj=latlong") will create a 
        geographic projection class.
        </p><p>
   Eg of usage : the following example will convert a lat/long point to an LCC projection :  
        </p><pre class="programlisting">
        $projInObj = ms_newprojectionobj("proj=latlong");
        $projOutObj = ms_newprojectionobj("proj=lcc,ellps=GRS80,lat_0=49,lon_0=-95,lat_1=49,lat_2=77");
        $poPoint = ms_newpointobj();
        $poPoint-&gt;setXY(-92.0, 62.0);         
        $poPoint-&gt;project($projInObj, $projOutObj);
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="rectObj"></a>RectObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="rect_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   RectObj are sometimes embedded inside other objects.  New ones can
   also be created with:

   RectObj ms_newRectObj()  
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="rect_members"></a>Members:</h5></div></div><pre class="programlisting">
   double minx
   double miny
   double maxx
   double maxy     
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="rect_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.

   void setextent(double minx, double miny, double maxx, double maxy)
  Set the rectangle extents.

   int draw(mapObj map, layerObj layer, imageObj img, 
            int class_index, string text)
        Draws the individual rectangle using layer.  The class_index is used
        to classify the rectangle based on the classes defined for the layer.
        The text string is used to annotate the rectangle.
        Returns MS_SUCCESS/MS_FAILURE.

  double fit(int width, int height)
        Adjust extents of the rectangle to fit the width/height specified.

  int project(projectionObj in, projectionObj out)
        Project the rectangle from "in" projection (1st argument) to "out" 
        projection (2nd argument).  Returns MS_SUCCESS/MS_FAILURE.

  void free()
        Destroys resources used by a rect object.        
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="referenceMapObj"></a>ReferenceMapObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="ref_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
  Instances of referenceMapObj are always embedded inside the mapObj.     
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="ref_members"></a>Members:</h5></div></div><pre class="programlisting">
   string   image
   int      width
   int      height
   int      status
   rectObj  extent
   ColorObj color
   ColorObj outlinecolor
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="ref_method"></a>Method:</h5></div></div><pre class="programlisting">
   int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.  
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="result"></a>ResultCacheMemberObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="result_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   Instances of ResultCacheMemberObj are always obtained through 
   layerObj's getResult() method.
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="result_members"></a>Members:</h5></div></div><pre class="programlisting">
   int    shapeindex    (read-only)
   int    tileindex     (read-only)
   int    classindex    (read-only)
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="scale"></a>ScalebarObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="scale_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
  Instances of scalebarObj are always are always embedded inside the mapObj.
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="scale_members"></a>Members:</h5></div></div><pre class="programlisting">
   int height;
   int width;
   int style;      
   int intervals;
   colorObj color;
   colorObj backgroundcolor;            
   colorObj outlinecolor;
   int units;
   int status; //MS_ON, MS_OFF, MS_EMBED
   int position; //for embeded scalebars, MS_UL, MS_UC, ...
   int transparent;
   int interlace;
   int postlabelcache;
   labelObj label;
   colorObj imagecolor;
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="scale_methods"></a>Methods:</h5></div></div><pre class="programlisting">
      int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.
        
      int setimagecolor(int red, int green, int blue)
        Sets the imagecolor propery (baclground) of the object.
        Returns false on error.         
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="shapefileObj"></a>ShapefileObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="shp_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   shapefileObj ms_newShapefileObj(string filename, int type)
        Opens a shapefile and returns a new object to deal with it. 
        Filename should be passed with no extension.
        To create a new file (or overwrite an existing one), type should 
        be one of MS_SHP_POINT, MS_SHP_ARC, MS_SHP_POLYGON or 
        MS_SHP_MULTIPOINT.
        Pass type as -1 to open an existing file for read-only access,
  and type=-2 to open an existing file for update (append).
      </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="shp_members"></a>Members:</h5></div></div><pre class="programlisting">
   int     numshapes  (read-only)
   int     type       (read-only)
   string  source     (read-only)
   rectObj bounds     (read-only)
      </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="shp_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   shapeObj getShape(int i)
        Retrieve shape by index.

   shapeObj getPoint(int i)
        Retrieve point by index.
      
   shapeObj getTransformed(mapObj map, int i)
        Retrieve shape by index.

   rectObj getExtent(int i)
        Retrieve a shape's bounding box by index.

   int addShape(shapeObj shape)
        Appends a shape to an open shapefile.
        
   int addPoint(pointObj point)
        Appends a point to an open shapefile.

   void free()
        Closes a shape file (and commits all changes in write mode) and 
        releases all resources used by the object.  
      </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="ShapeObj"></a>ShapeObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="shape_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   ShapeObj ms_newShapeObj(int type)
        'type' is one of MS_SHAPE_POINT, MS_SHAPE_LINE, MS_SHAPE_POLYGON or
        MS_SHAPE_NULL 
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="shape_members"></a>Members:</h5></div></div><pre class="programlisting">
   string  text
   int     classindex
   int     type      (read-only)
   int     numlines  (read-only)
   int     index     (read-only)
   int     tileindex (read-only)
   rectObj bounds    (read-only)
   int     numvalues (read-only)
   array   values    (read-only)

   The values array is an associative array with the attribute values for
   this shape.  It is set only on shapes obtained from layer-&gt;getShape().
   The key to the values in the array is the attribute name, e.g. 
     $population = $shape-&gt;values["Population"];  
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="shape_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.
 
   int add(lineObj line)
        Add a line (i.e. a part) to the shape.

   LineObj line(int i)
        Returns a reference to line number i.  Reference is valid only
        during the life of the shapeObj that contains the point.

   int draw(mapObj map, layerObj layer, imageObj img)
        Draws the individual shape using layer.
        Returns MS_SUCCESS/MS_FAILURE.

   boolean contains(pointObj point)
        Returns MS_TRUE if the point is inside the shape, MS_FALSE otherwise.

   boolean intersects(shapeObj shape)
        Returns MS_TRUE if the two shapes intersect, MS_FALSE otherwise.
     
   int project(projectionObj in, projectionObj out)
        Project the shape from "in" projection (1st argument) to "out" 
        projection (2nd argument).  Returns MS_SUCCESS/MS_FAILURE.

   pointObj getpointusingmeasure(double m)
        Apply only on Measured shape files. Given a measure m, retun the 
        corresponding XY location on the shapeobject.
   
   pointObj  getmeasureusingpoint(pointObject point)
       Apply only on Measured shape files. Given an XY Location, find the 
       nearest point on the shape object. Return a point object
       of this point with the m value set.

   void free()
        Destroys resources used by a shape object.  
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="style"></a>StyleObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="style_contructor"></a>Constructor:</h5></div></div><pre class="programlisting">
   Instances of styleObj are always embedded inside the classObj.

   styleObj ms_newStyleObj(classObj class, styleobj style)

   The second argument 'style' is optional. If given, the new style
   created will be a copy of the style passed as argument.      
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="style_members"></a>Members:</h5></div></div><pre class="programlisting">
  int           symbol
  string        symbolname
  int           size
  int           minsize 
  int           maxsize 
  int           offsetx
  int           offsety
  colorObj      color
  colorObj      backgroundcolor
  colorObj      outlinecolor    
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="style_methods"></a>Methods:</h5></div></div><pre class="programlisting">
   int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.
 
   styleObj clone()
     Returns a cloned copy of the style.         
        </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="symbolobj"></a>symbolObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="symb_contructor"></a>Contructor:</h5></div></div><pre class="programlisting">
  symboldid = ms_newsymbolobj(mapObj map, string symbbolname);
        
  Creates a new symbol with default values in the symbolist. 
  Returns the Id of the new symbol. If a symbol with the same
  name exists, It's id will be returned.

  To ge a symbol object, you need to use a function on the mapobject :
        $oSymbol = $map-&gt;getsymbolobjectbyid($nId);
           </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="symb_members"></a>Members:</h5></div></div><pre class="programlisting">
  string name;
  type name;  //Please refer to symbol type constants
  int inmapfile; If set to TRUE, the symbol will be saved inside the mapfile.
  double sizex;
  double sizey
  int numpoints
  int filled;
  int stylelength;
           </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="symb_functions"></a>Functions:</h5></div></div><pre class="programlisting">
 int set(string property_name, new_value)
   Set object property to a new value.

 int setpoints(array double)
    Set the points of the symbol. Note that the values passed if an
    array containing the x and y values of the points. Example
    array[0] = 1  : x value of the first point
    array[1] = 0 : y values of the first point
    array[2] = 1 : x value of the 2nd point
    ....

 int setstyle(array int)
    Set the style of the symbol (used for dash patterns)

 array getpointsarray()
    Returns an array containing the points of the symbol. Refer
    to setpoints to see how the array should be interpreted.

 array getstylearray()  
    Returns an array containing the style.
           </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="symb_example"></a>Example:</h5></div></div><pre class="programlisting">
  // create a symbol to be used as a dashed line   
           
  $nId = ms_newsymbolobj($gpoMap, "mydash");
  $oSymbol = $gpoMap-&gt;getsymbolobjectbyid($nId);
  $oSymbol-&gt;set("filled", MS_TRUE);
  $oSymbol-&gt;set("sizex", 1);
  $oSymbol-&gt;set("sizey", 1);
  $oSymbol-&gt;set("inmapfile", MS_TRUE);
    
  $aPoints[0] = 1;
  $aPoints[1] = 1;
  $oSymbol-&gt;setpoints($aPoints);
    
  $aStyle[0] = 10;
  $aStyle[1] = 5;
  $aStyle[2] = 5;
  $aStyle[3] = 10;
  $oSymbol-&gt;setstyle($aStyle);

  $style-&gt;set("symbolname", "mydash");     
         </pre></div></div><div class="sect3"><div class="titlepage"><div><h4 class="title"><a name="webobj"></a>WebObj Class</h4></div></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="web_constructor"></a>Constructor:</h5></div></div><pre class="programlisting">
  Instances of webObjare always are always embedded inside the mapObj.    
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="web_members"></a>Members:</h5></div></div><pre class="programlisting">
    string log;
    string imagepath
    string template   
    string imageurl
    string header
    string footer
    string empty     (read-only)
    string error     (read-only)
    string mintemplate
    string maxtemplate
    double minscale
    double maxscale
   rectObj extent   (read-only)
        </pre></div><div class="sect4"><div class="titlepage"><div><h5 class="title"><a name="web_methods"></a>Method:</h5></div></div><pre class="programlisting">
      int set(string property_name, new_value)
        Set object property to a new value. Returns -1 on error.
        </pre></div></div></div></div><div class="sect1"><div class="titlepage"><div><h2 class="title"><a name="docinfo"></a>About This Document</h2></div></div><div class="sect2"><div class="titlepage"><div><h3 class="title"><a name="copyright"></a>Copyright Information</h3></div></div><p>
                Copyright (c) 2004, Jeff McKenna, DM Solutions Group Inc.
            </p><p>
                This documentation is covered by the same Open Source license as the
                MapServer software itself.  See MapServer's 
                <a href="http://mapserver.gis.umn.edu/license.html" target="_top">License and 
                Credits</a> page for the complete text.
            </p></div><div class="sect2"><div class="titlepage"><div><h3 class="title"><a name="disclaimer"></a>Disclaimer</h3></div></div><p>
            No liability for the contents of this document can be accepted.
            Use the concepts, examples and other content at your own risk.
            As this is a new edition of this document, there may be errors
            and inaccuracies that may be damaging to your system.
            Although this is highly unlikely, the author(s) do not take any 
            responsibility for that:  proceed with caution.
                  </p></div><div class="sect2"><div class="titlepage"><div><h3 class="title"><a name="feedback"></a>Feedback</h3></div></div><p>
            Send any comments or suggestions to the author.
        </p></div></div></div><table xmlns="http://www.w3.org/TR/xhtml1/transitional" align="center" width="75%" border="1"><tr><td bgcolor="#FFFF66"><a href="javascript:add_comment()"><font size="+1">Add a Comment</font></a></td></tr><!--#include file="phpmapscript-class-guide.txt"--></table><script xmlns="http://www.w3.org/TR/xhtml1/transitional" language="javascript">doc_footer();</script></body></html>