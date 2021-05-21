package test;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;

import po.FxgamesBuscadorPage;
import po.FxgamesHomePage;
import utils.MetodosComunes;
import utils.PropertiesManager;

public class Test06 {

	public static void main(String[] args) {
		// Llamar a los métodos comunes para setear el driver
		String test = "Test06";
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
		String mensaje = "Super Mario Party";
		try {
			// navegar a url
			driver.get(pm.url);
			//Pasos del test
			FxgamesHomePage home = new FxgamesHomePage(driver, wait);
			traza = "Paso 1 => Se introduce en el buscador la palabra Mario y se pulsa intro";
			home.escribirBuscador("Mario");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 1");
			FxgamesBuscadorPage buscador = new FxgamesBuscadorPage(driver, wait);
			//comprobación del test
			String res="";
			if (mensaje.equals(buscador.leerTituloProductoBuscado())) {
				res ="OK";
				traza = "Resultado => Test OK. Se han encontrado resultados para la búsqueda";
				mc.writeReport("INFO", res, traza, driver, "Resultado");
			}else {
				res ="KO";
				traza = "Resultado => Test KO. " ;
				mc.writeReport("ERROR", res, traza, driver, "Resultado");
			}
			if (args.length>0) {
				mc.writeExcelReport(test, res, 6, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 6, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}
}
