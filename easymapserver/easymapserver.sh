#!/bin/sh
# $Id: easymapserver.sh,v 1.9 2004/07/13 09:15:32 mose Exp $
# Copyright (C) 2003-2004 mose, http://mose.fr
# Copyright (C) 2002 Makina Corpus, http://makina-corpus.org
# Maintained by mose <mose@mose.fr>
# Created by mastre <mastre@beve.org>
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to 
# the Free Software Foundation, Inc., 59 Temple Place - Suite 330, 
# Boston, MA  02111-1307, USA.
# ------------------------------------------------------------------
# version 0.5 - 
# version 0.4 - 19 09 03
# version 0.3 - 17 06 03
# version 0.2 - 31 10 02 
# version 0.1 - 30 09 02 

HERE=`pwd`
EXTDIR="$HERE/src"
SUBDIRS="conf php cgi-bin www"
IDEFAULTDIR="/usr/local/mapserver"
IDEFAULTIP="127.0.0.1"
IDEFAULTSERVERNAME="mapserver.localhost"

# Location of the sources
PHPURL="http://fr3.php.net/get/php-4.3.7.tar.gz/from/fr.php.net/mirror"
MAPSERVERURL="http://cvs.gis.umn.edu/dist/mapserver-4.2.1.tar.gz"
GDALURL="ftp://ftp.remotesensing.org/pub/gdal/gdal-1.2.1.tar.gz"

GDALOPTIONS="--with-ogr"

PHPOPTIONS="\
--enable-track-vars \
--enable-trans-sid \
--with-regex=system \
--with-gd=shared \
--with-png-dir=shared \
--with-zlib \
--with-ttf \
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

SHELL="/bin/sh"
MKDIR="/bin/mkdir"
SED="/bin/sed"
CAT="/bin/cat"
LN="/bin/ln -s"
MV="/bin/mv"
CP="/bin/cp"

scangz() {
	# Set variables GDAL, PHP, MAPSERVER 
	for dir in $@; do
  	TMP=`ls -1 $EXTDIR | grep -i "$dir.*\.tar\.gz"`
		eval `echo $dir`=$TMP
	done
}

scandir() {
# Set variables GDALDIR, PHPDIR, MAPSERVERDIR 
	if [ ! -d $EXTDIR ]; then
		mkdir $EXTDIR
	fi			
	for dir in $@; do
		TMP=`ls -1F $EXTDIR | grep -i "$dir.*/" | cut -d"/" -f1`
		eval `echo ${dir}DIR`=$TMP
	done
}

exiterr() {
# Show a message and exit
	echo "ERROR: $1" 
	exit 1
}

uncompress() {
# Uncompress file
	echo -n "Uncompressing files... "
	for gz in $@; do
		cd $EXTDIR && tar xzf $gz 
	done
	echo "Done."
}

getsources() {
# Get sources from url
	if cd $EXTDIR; then
		if wget $1; then
			echo "Download complete"
		else
			exiterr "Could not download $1, please check the URL"
		fi
	fi
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
	if [ -z "$answer" ]; then
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
	if [ -z "$installdir" ]; then
		installdir=$IDEFAULTDIR
	fi
	INSTALLDIR=$installdir
	echo -n "Define virtualhost ip : [$IDEFAULTIP] "
	read ip
	if [ -z "$ip" ]; then
		ip=$IDEFAULTIP
	fi
	VIRTUALHOST=$ip
	echo -n "Define virtualhost Server Name : [$IDEFAULTSERVERNAME] "
	read virtualhost
	if [ -z "$virtualhost" ]; then
		virtualhost=$IDEFAULTSERVERNAME
	fi
	MAPSERVHOST=$virtualhost
	for DEFAULTLOGDIR in /var/log/apache /var/log/httpd; do
		if [ -d $DEFAULTLOGDIR ]; then
			break
		fi
	done
	echo -n "In which directory do you want apache logs ? [$DEFAULTLOGDIR] "
	read logdir
	if [ -z "$logdir" ]; then
		logdir=$DEFAULTLOGDIR
	fi
	LOGDIR=$logdir
}

install() {
	configure
	$MKDIR -p $INSTALLDIR
	for dir in $SUBDIRS ; do 
		$MKDIR -p "$INSTALLDIR/$dir"
	done 
	echo -n "Do you want to (re)install gdal ? [Y/n] "
	ask
	if [ $act -gt 0 ];then
		echo ":::::: $EXTDIR/$GDALDIR"
		cd "$EXTDIR/$GDALDIR"
		./configure $GDALOPTIONS
		make
		make install
		echo "... gdal installed."
	fi	
	echo -n "Do you want to (re)install php ? [Y/n] "
	ask
	if [ $act -gt 0 ]; then
		cd "$EXTDIR/$PHPDIR" || exit 1
		./configure --prefix="$INSTALLDIR/php" --with-config-file-path="$INSTALLDIR/conf" $PHPOPTIONS
		make
		make install
		$MV sapi/cgi/php "$INSTALLDIR/cgi-bin"
		$CP php.ini-dist "$INSTALLDIR/conf/php.ini"
		$MKDIR -p "$INSTALLDIR/lib/php/extensions"
		if [ ! -h "$INSTALLDIR/lib/php/extensions/no-debug-non-zts-20020429" ]; then 
			$LN /usr/lib/php/extensions/no-debug-non-zts-20020429 "$INSTALLDIR/lib/php/extensions"
		fi
		echo "extension_dir = $INSTALLDIR/www" >> $INSTALLDIR/conf/php.ini
		echo "... PHP4 installed."
	fi
	echo -n "Do you want to (re)install mapserver ? [Y/n] "
	ask
	if [ $act -gt 0 ];then
	# Ugly patch need to be fixed when mapserver install updated
		$MKDIR -p /usr/local/include/mapserver-3.5 
		cd "$EXTDIR/$MAPSERVERDIR" || exit 1
		./configure --exec-prefix="$INSTALLDIR/mapserv" --prefix="$INSTALLDIR/mapserv" --with-php=$EXTDIR/$PHPDIR $MAPSERVEROPTIONS
		# seems it's corrected in mapserver version 4.6.3
		# cd $EXTDIR/$MAPSERVERDIR/mapscript/php3
		# $CAT Makefile | $SED -e "s/cc  cc/cc/" > Makefile 
		# cd $EXTDIR/$MAPSERVERDIR
		make
		make install
		$MV mapserv ${INSTALLDIR}/cgi-bin
		$CP mapscript/php3/php_mapscript.so ${INSTALLDIR}/www/. 
		cd $HERE/misc
		$CAT httpd.conf | $SED -e "s|MAPSERVHOST|$MAPSERVHOST|" -e "s|INSTALLDIR|$INSTALLDIR|" -e "s|VIRTUALHOST|$VIRTUALHOST|" > mapserv.conf
		$MV mapserv.conf $INSTALLDIR/conf
		$CP phpinfo.php $INSTALLDIR/www
		if [ ! -f ${INSTALLDIR}/www/index.php ]; then 
			$LN ${INSTALLDIR}/www/phpinfo.php ${INSTALLDIR}/www/index.php
		fi 
		echo "... Mapserver installed."
	fi
}

clean() {
	# Not used yet
	if [ ! -n "$PHPDIR" ] || [ ! -n "$GDALDIR" ] || [ ! -n "$MAPSERVERDIR" ] ; then
		scandir GDAL PHP MAPSERVER 
	fi
	SOURCESDIR="$GDALDIR $MAPSERVERDIR $PHPDIR"
	echo "Cleaning source directories"
	for dir in $SOURCESDIR ; do
		cd $INSTALLDIR/$dir
		make clean
	done
}

distclean() {
	# Not used yet
	if [ ! -n "$PHPDIR" ] || [ ! -n "$GDALDIR" ] || [ ! -n "$MAPSERVERDIR" ] ; then
		scandir GDAL PHP MAPSERVER 
	fi
	SOURCESDIR="$GDALDIR $MAPSERVERDIR $PHPDIR"
	echo "Removing mapserver from your system"
	for dir in $SUBDIRS ; do 
		rm -rf  $INSTALLDIR/$dir
	done
	for dir in $SOURCESDIR ; do
		cd $INSTALLDIR/$dir
		make clean
	done
}

checkroot

scandir GDAL PHP MAPSERVER 
if [ -z "$PHPDIR" ] || [ -z "$GDALDIR" ] || [ -z "$MAPSERVERDIR" ] ; then
	echo "It seems to be the first time you run this installer, or building environnement is altered."
	echo -n "Do you want to uncompress required archives ? [Y/n] "
	ask
	if [ $act -gt 0 ]; then
		scangz GDAL PHP MAPSERVER 
		echo "Looking for sources"
		# Check source dir
		for arch in GDAL PHP MAPSERVER; do
			eval tmpgz=\${$arch}
			# If no source found, ask to download it
			if [ -z "$tmpgz" ]; then 
				echo -n "$arch sources not found, download it ?  (wget needed) [Y/n] "
				ask
				if [ $act -gt 0 ];then
					eval url=\$`echo ${arch}URL`				
					echo -n "Location of $arch sources [$url]"
					read sourcepath
					if [ -z "$sourcepath" ]; then
						sourcepath="$url"
					fi
					getsources "$sourcepath"
				else 
					exiterr "Please put gz into src directory, or launch installer again."
				fi
			fi
		done
		# At this step, Gz must be in src dir, proceed to unpack
		if [ -z "$PHP" ] || [ -z "$GDAL" ] || [ -z "$MAPSERVER" ] ; then
			scangz GDAL PHP MAPSERVER 
		fi	
		uncompress $GDAL $PHP $MAPSERVER
		else 
		exiterr "Installation aborted. You may run installation script again."
	fi
fi
if [ -z "$PHPDIR" ] || [ -z "$GDALDIR" ] || [ -z "$MAPSERVERDIR" ] ; then
	scandir GDAL PHP MAPSERVER 
fi

SOURCESDIR="$GDALDIR $MAPSERVERDIR $PHPDIR"

install

exit 0
