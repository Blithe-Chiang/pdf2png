#!/bin/bash
# 
# function:
# convert multi-page pdf document to *an* png image.
# 
# dependencies: ImageMagick ghostscript
# 
# usage: ./topng.sh $yourPdfFileName


filename=$1;

outputname=`basename $filename .pdf`;
output="${outputname}.png";

convert $filename -append $output
echo $output;