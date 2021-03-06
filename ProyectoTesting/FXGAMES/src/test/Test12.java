package test;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;

import po.FxgamesCestaPage;
import po.FxgamesHomePage;
import po.FxgamesPerfilPage;
import po.FxgamesProductosVitaPage;
import po.FxgamesVideojuegoPage;
import utils.MetodosComunes;
import utils.PropertiesManager;

public class Test12 {
	public static void main(String[] args) {
		// Llamar a los m?todos comunes para setear el driver
		String test = "Test12";
		PropertiesManager pm = new PropertiesManager();
		pm.readProperies();
		pm.rutaEvidencias = pm.rutaEvidencias + "//"+test;
		MetodosComunes mc = new MetodosComunes();
		mc.setRutaEvidencias(pm.rutaEvidencias);
		mc.createFolderTest();
		pm.rutaEvidencias = mc.rewrite(pm.sobreescribir);
		mc.setRutaEvidencias(pm.rutaEvidencias);
		mc.createFolderTest();
		WebDriver driver = mc.setearDriver(pm.headless);
		WebDriverWait wait = mc.setearWait(driver, pm.tiempo);
		mc.maximizar(driver);
		//Se crean los mensajes para las evidencias
		String traza = "";
		String mensaje = "Tu cesta est? vac?a.";
		try {
			// navegar a url
			driver.get(pm.url);
			//Pasos del test
			FxgamesHomePage home = new FxgamesHomePage(driver, wait);
			traza = "Paso 1 => Acceder a la pantalla de perfil pulsando el icono del avatar arriba a la derecha";
			home.accederPerfil();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 1");
			FxgamesPerfilPage perfil = new FxgamesPerfilPage(driver, wait);
			traza = "Paso 2 => Se introduce en el campo email pruebasfxg@gmail.com";
			perfil.escribirEmailIniciar("pruebasfxg@gmail.com");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 2");
			traza = "Paso 3 => Se introduce en el campo password fxgtesting";
			perfil.escribirPass("fxgtesting");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 3");
			traza = "Paso 4 => Se pulsa en el bot?n Iniciar Sesi?n.";
			perfil.pulsarIniciarSesion();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 4");
			traza = "Paso 5 => Se pulsa la opci?n Videojuegos del men?. En el submen? pulsamos la opci?n Juegos para VITA";
			home.pulsarVideojuegos();
			home.pulsarVita();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 5");
			FxgamesProductosVitaPage productosVita = new FxgamesProductosVitaPage(driver, wait);
			traza = "Paso 6 => Se pulsa en G?nero y en el submen? se selecciona Lucha";
			productosVita.pulsarFiltroGenero();
			productosVita.pulsarGeneroLucha();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 6");
			traza = "Paso 7 => Se pulsa en la imagen del producto One Piece Burning Blood";
			productosVita.pulsarJuego();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 7");
			FxgamesVideojuegoPage videojuego = new FxgamesVideojuegoPage(driver, wait);
			traza = "Paso 8 => Se pulsa en el bot?n A?adir a la cesta";
			videojuego.pulsarAnadirCesta();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 8");
			traza = "Paso 9 => Se pulsa en el bot?n Ir a la cesta";
			videojuego.pulsarIrCesta();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 9");
			FxgamesCestaPage cesta = new FxgamesCestaPage(driver, wait);
			traza = "Paso 10 => Se introduce un 2 en la opci?n Cantidad y se pulsa Actualizar";
			cesta.escribirCantidad("2");
			cesta.pulsarActualizar();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 10");
			traza = "Paso 11 => Se pulsa en el bot?n de la X";
			cesta.pulsarX();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 11");
			//comprobaci?n del test
			String res="";
			if (mensaje.equals(cesta.leerTituloTienda())) {
				res ="OK";
				traza = "Resultado => Test OK. ";
				mc.writeReport("INFO", res, traza, driver, "Resultado");
			}else {
				res ="KO";
				traza = "Resultado => Test KO. " ;
				mc.writeReport("ERROR", res, traza, driver, "Resultado");
			}
			if (args.length>0) {
				mc.writeExcelReport(test, res, 12, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 12, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}
}
