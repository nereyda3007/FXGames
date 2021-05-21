package test;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;

import po.FxgamesHomePage;
import po.FxgamesProductosVitaPage;
import utils.MetodosComunes;
import utils.PropertiesManager;

public class Test09 {
	public static void main(String[] args) {
		// Llamar a los métodos comunes para setear el driver
		String test = "Test09";
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
		String mensaje = "One Piece Burning Blood";
		try {
			// navegar a url
			driver.get(pm.url);
			//Pasos del test
			FxgamesHomePage home = new FxgamesHomePage(driver, wait);
			traza = "Paso 1 => Se pulsa la opción Videojuegos del menú. En el submenú pulsamos la opción Juegos para VITA";
			home.pulsarVideojuegos();
			home.pulsarVita();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 1");
			FxgamesProductosVitaPage productosVita = new FxgamesProductosVitaPage(driver, wait);
			traza = "Paso 2 => Se pulsa en Género y en el submenú se selecciona Lucha";
			productosVita.pulsarFiltroGenero();
			productosVita.pulsarGeneroLucha();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 2");
			//comprobación del test
			String res="";
			if (mensaje.equals(productosVita.leerTituloJuego())) {
				res ="OK";
				traza = "Resultado => Test OK. ";
				mc.writeReport("INFO", res, traza, driver, "Resultado");
			}else {
				res ="KO";
				traza = "Resultado => Test KO. " ;
				mc.writeReport("ERROR", res, traza, driver, "Resultado");
			}
			if (args.length>0) {
				mc.writeExcelReport(test, res, 9, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 9, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}
}
