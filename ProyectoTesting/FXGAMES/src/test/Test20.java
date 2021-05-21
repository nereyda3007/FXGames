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

public class Test20 {
	public static void main(String[] args) {
		// Llamar a los métodos comunes para setear el driver
		String test = "Test20";
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
		String mensaje = "PEDIDO CON LOCALIZADOR";
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
			traza = "Paso 4 => Se pulsa en el botón Iniciar Sesión.";
			perfil.pulsarIniciarSesion();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 4");
			traza = "Paso 5 => Se pulsa la opción Videojuegos del menú. En el submenú pulsamos la opción Juegos para VITA";
			home.pulsarVideojuegos();
			home.pulsarVita();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 5");
			FxgamesProductosVitaPage productosVita = new FxgamesProductosVitaPage(driver, wait);
			traza = "Paso 6 => Se pulsa en Género y en el submenú se selecciona Lucha";
			productosVita.pulsarFiltroGenero();
			productosVita.pulsarGeneroLucha();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 6");
			traza = "Paso 7 => Se pulsa en la imagen del producto One Piece Burning Blood";
			productosVita.pulsarJuego();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 7");
			FxgamesVideojuegoPage videojuego = new FxgamesVideojuegoPage(driver, wait);
			traza = "Paso 8 => Se pulsa en el botón Añadir a la cesta";
			videojuego.pulsarAnadirCesta();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 8");
			traza = "Paso 9 => Se pulsa en el botón Ir a la cesta";
			videojuego.pulsarIrCesta();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 9");
			traza = "Paso 10 => Se pulsa el botón Tramitar pedido";
			FxgamesCestaPage cesta = new FxgamesCestaPage(driver, wait);
			cesta.pulsarAceptarCompra();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 10");
			traza = "Paso 11 => Se pulsa el icono del perfil arriba a la derecha.";
			home.accederPerfil2();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 11");
			traza = "Paso 12 => Se pulsa en historial de compras";
			perfil.pulsarHistorial();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 12");
			traza = "Paso 13 => Se pulsa en el icono del camión";
			perfil.pulsarCamion();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 13");
			//comprobación del test
			String res="";
			if (mensaje.equals(perfil.leerLocalizador().substring(0,22))) {
				res ="OK";
				traza = "Resultado => Test OK. ";
				mc.writeReport("INFO", res, traza, driver, "Resultado");
			} else {
				res ="KO";
				traza = "Resultado => Test KO. ";
				mc.writeReport("ERROR", res, traza, driver, "Resultado");
			}
			if (args.length>0) {
				mc.writeExcelReport(test, res, 20, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 20, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}
}
