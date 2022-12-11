@REM C:/FFMpeg/bin/ffmpeg.exe is the binary location of ffmpeg
start /B /WAIT C:/FFMpeg/bin/ffmpeg.exe -i %1 %2

del %1