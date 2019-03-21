function BackgroundRandom() {
    /*switch (Random(1, 1)) {
        case 0:
            BackGruondNow.Filetype = 'png';
            BackGruondNow.URL = BackGruond_png.URL;
            BackGruondNow.Max = BackGruond_png.Max;
            break;
        case 1:*/
            BackGruondNow.Filetype = 'jpg';
            BackGruondNow.URL = BackGruond_jpg.URL;
            BackGruondNow.Max = BackGruond_jpg.Max;
            /*break;
    }*/
    BackGruondNow.Name = Random(1, BackGruondNow.Max);

       
    

}