#!/bin/sh
#------------------------------------------------------------------
# $Id: easymapserver.sh,v 1.2 2002/09/30 06:06:53 mose Exp $
# Copyright (C) 2002 Makina Corpus, http://makina-corpus.org
# Created and maintained by mastre <mastre@makina-corpus.org>
# Released under GPL version 2 or later, see LICENSE file
# or http://www.gnu.org/copyleft/gpl.html
#------------------------------------------------------------------
# version 0.1 - 30 09 02 07:20:43 
# debugged by mose

HERE=`pwd`
EXTDIR="$HERE/src"
SHELL=/bin/sh
SUBDIRS="conf php cgi-bin www"
IDEFAULTDIR="/usr/local/mapserver"
IDEFAULTIP="127.0.0.1"
IDEFAULTSERVERNAME="mapserver.localhost"

# Location of the sources
PHPURL="http://www.php.net/do_download.php?mr=http%3A%2F%2Ffr2.php.net%2F&df=php-4.2.3.tar.gz"
MAPSERVERURL="http://mapserver.gis.umn.edu/dist/mapserver-3.6.1.tar.gz"
GDALURL="ftp://ftp.remotesensing.org/pub/gdal/gdal-1.1.7.tar.gz"

GDALOPTIONS="--with-ogr"

PHPOPTIONS="\
--enable-track-vars \
--with-system-regex \
--enable-trans-sid \
--with-gd=shared \
--with-png-dir=shared \
--with-zlib \
--without-ttf \
--with-dbase \
--with-mysql"

MAPSERVEROPTIONS="\
--with-jpeg \
--with-ogr \
--with-eppl \
--with-tiff \
--with-png \
--with-zlib \
--with-freetype \
--with-gd \
--with-gdal"

scangz() {
	# Set variables GDAL, PHP, MAPSERVER 
	for dir in $@; do
  	TMP=`ls -1 $EXTDIR | grep -i "$dir.*\.tar\.gz"`
		eval `echo $dir`=$TMP
	done
}

scandir() {
# Set variables GDALDIR, PHPDIR, MAPSERVERDIR 
	for dir in $@; do
		TMP=`ls -1F $EXTDIR | grep -i "$dir.*/" | cut -d"/" -f1`
		eval `echo ${dir}DIR`=$TMP
	done
}

exiterr() {
# Show a message and exit
	echo $1 
	exit 0
}

uncompress() {
# Uncompress file
	for gz in $@; do
		cd $EXTDIR && tar xvzf $gz 
	done
}

getsources() {
# Get sources from url
	cd $EXTDIR && wget $1
	echo "Download complete"
}

checkroot() {
	WAI=`whoami`
	if [ ! $UID = 0 ] || [ ! $WAI = "root" ]; then
		echo "You must be root to run this program"
		exit 0
	fi
}

ask() {
# Yes/No system
	read answer 
	if [ ! -n "$answer" ]; then
		answer=y
	fi
	if [ "$answer" = "y" ] || [ "$answer" = "Y" ] ; then
		act=1
		else act=0
	fi
}

gg() {
	echo ""
	echo "*****************************************************"
	echo "*        Mapserver installation successful          *"
	echo "*****************************************************"
	echo ""
	echo " Add this line to your httpd.conf:"
	echo " Include $INSTALLDIR/conf/mapserv.conf"
	echo ""
	echo " Mapserver can be accessed using your web browser:"
	echo " http://$MAPSERVHOST"
	echo ""
}

configure() {
	echo -n "Where do you want Mapserver to be installed ? [$IDEFAULTDIR] "
	read installdir 
	if [ ! -n "$installdir" ]; then
		installdir=$IDEFAULTDIR
	fi
	INSTALLDIR=$installdir
	echo -n "Define virtualhost ip : [$IDEFAULTIP] "
	read ip
	if [ ! -n "$ip" ]; then
		ip=$IDEFAULTIP
	fi
	VIRTUALHOST=$ip
	echo -n "Define virtualhost Server Name : [$IDEFAULTSERVERNAME] "
	read virtualhost
	if [ ! -n "$virtualhost" ]; then
		virtualhost=$IDEFAULTSERVERNAME
	fi
	MAPSERVHOST=$virtualhost
}

install() {
	configure
	mkdir -p $INSTALLDIR
	for dir in $SUBDIRS ; do mkdir -p "$INSTALLDIR/$dir" ; done 
	echo -n "Do you want to (re)install gdal ? [Y/n] "
	ask
	if [ $act -gt 0 ];then
		echo ":::::: $EXTDIR/$GDALDIR"
		cd "$EXTDIR/$GDALDIR" && ./configure $GDALOPTIONS && make && make install || exit 0 
	fi	
	echo -n "Do you want to (re)install php ? [Y/n] "
	ask
	if [ $act -gt 0 ];then
		cd "$EXTDIR/$PHPDIR" && ./configure --prefix="$INSTALLDIR/php" --with-config-file-path="$INSTALLDIR/conf" $PHPOPTIONS  && make && make install || exit 0
		mv php "$INSTALLDIR/cgi-bin" && cp php.ini-dist "$INSTALLDIR/conf/php.ini" && \
		mkdir -p "$INSTALLDIR/lib/php/extensions" && \
		if [ ! -h "$INSTALLDIR/lib/php/extensions/no-debug-non-zts-20020429" ];then ln -s /usr/lib/php/extensions/no-debug-non-zts-20020429 "$INSTALLDIR/lib/php/extensions";fi
	fi
	echo -n "Do you want to (re)install mapserver ? [Y/n] "
	ask
	if [ $act -gt 0 ];then
	# Ugly patch need to be fixed when mapserver install updated
		mkdir -p /usr/local/include/mapserver-3.5 
		cd "$EXTDIR/$MAPSERVERDIR" && ./configure --exec-prefix="$INSTALLDIR/mapserv" --prefix="$INSTALLDIR/mapserv" --with-php=$EXTDIR/$PHPDIR $MAPSERVEROPTIONS
		cd "$EXTDIR/$MAPSERVERDIR/mapscript/php3" && cat Makefile | replace "cc  cc" cc > Makefile 
		cd "$EXTDIR/$MAPSERVERDIR" && make && make install || exit 0
		mv mapserv ${INSTALLDIR}/cgi-bin && cp mapscript/php3/php_mapscript.so ${INSTALLDIR}/www/. 
		cd "$HERE/misc" && cat httpd.conf | replace MAPSERVHOST $MAPSERVHOST INSTALLDIR $INSTALLDIR VIRTUALHOST $VIRTUALHOST> mapserv.conf && mv mapserv.conf "$INSTALLDIR/conf" && \
		cp phpinfo.php $INSTALLDIR/www && \
		if [ ! -f ${INSTALLDIR}/www/index.php ];then ln -s ${INSTALLDIR}/www/phpinfo.php ${INSTALLDIR}/www/index.php;fi 
	gg
	fi
}

clean() {
	# Not used yet
	if [ ! -n "$PHPDIR" ] || [ ! -n "$GDALDIR" ] || [ ! -n "$MAPSERVERDIR" ] ; then
		scandir GDAL PHP MAPSERVER 
	fi
	SOURCESDIR="$GDALDIR $MAPSERVERDIR $PHPDIR"
	echo "Cleaning source directories"
	for dir in $SOURCESDIR ; do ( cd "$INSTALLDIR/$dir" ; ${MAKE} clean ) ; done
}

distclean() {
	# Not used yet
	if [ ! -n "$PHPDIR" ] || [ ! -n "$GDALDIR" ] || [ ! -n "$MAPSERVERDIR" ] ; then
		scandir GDAL PHP MAPSERVER 
	fi
	SOURCESDIR="$GDALDIR $MAPSERVERDIR $PHPDIR"
	echo "Removing mapserver from your system"
	for dir in $SUBDIRS ; do (rm -rf  "$INSTALLDIR/$dir") ; done
	for dir in $SOURCESDIR ; do ( cd "$INSTALLDIR/$dir" ; ${MAKE} clean ) ; done
}

checkroot
scandir GDAL PHP MAPSERVER 
if [ ! -n "$PHPDIR" ] || [ ! -n "$GDALDIR" ] || [ ! -n "$MAPSERVERDIR" ] ; then
	echo "It seems to be the first time you run this installer, or building environnement is altered."
	echo -n "Do you want to uncompress required archives ? [Y/n] "
	ask
	if [ $act -gt 0 ];then
		scangz GDAL PHP MAPSERVER 
		echo "Looking for sources"
		# Check source dir
		for arch in GDAL PHP MAPSERVER; do
			eval tmpgz=\${$arch}
			# If no source found, ask to download it
			if [ ! -n "$tmpgz" ]; then 
				echo -n "$arch sources not found, download it ?  (wget needed) [Y/n] "
				ask
				if [ $act -gt 0 ];then
					eval url=\$`echo ${arch}URL`
					getsources "$url"
				else exiterr "Please put gz into src directory, or launch installer again"
				fi
			fi
		done
		# At this step, Gz must be in src dir, proceed to unpack
		if [ ! -n "$PHP" ] || [ ! -n "$GDAL" ] || [ ! -n "$MAPSERVER" ] ; then
			scangz GDAL PHP MAPSERVER 
		fi	
		uncompress $GDAL $PHP $MAPSERVER
		else 
		exiterr "Installation aborted. You may run installation script again."
	fi
fi
if [ ! -n "$PHPDIR" ] || [ ! -n "$GDALDIR" ] || [ ! -n "$MAPSERVERDIR" ] ; then
	scandir GDAL PHP MAPSERVER 
fi

SOURCESDIR="$GDALDIR $MAPSERVERDIR $PHPDIR"

install

exit 0
