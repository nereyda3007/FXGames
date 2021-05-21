package utils;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.Calendar;

import org.apache.poi.EncryptedDocumentException;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.ss.usermodel.WorkbookFactory;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.openqa.selenium.OutputType;
import org.openqa.selenium.TakesScreenshot;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.io.FileHandler;
import org.openqa.selenium.support.ui.WebDriverWait;


public class MetodosComunes {

	private String rutaEvidencias;

	public String getRutaEvidencias() {
		return rutaEvidencias;
	}

	public void setRutaEvidencias(String rutaEvidencias) {
		this.rutaEvidencias = rutaEvidencias;
	}

	public WebDriver setearDriver(String headless) {
		// OBLIGATORIO system.property
		System.setProperty("webdriver.chrome.driver", "drivers/chromedriver.exe");
		// Modo headless(si se quiere abrir el navegador o no, si está no, el navegador se abre)
		if (headless.equalsIgnoreCase("no")) {
			return new ChromeDriver();
		} else {
			ChromeOptions options = new ChromeOptions();
			// se tienen que añadir como mínimo los argumetnos --headless para invisible y
			// --disable-gpu para evitar problemas de ruta,
			// --window-size para configurar el tamaño del navegador (si elegimos esta
			// opción, el método maximizar no hace nada)
			options.addArguments("--headless", "--disable-gpu", "--window-size=1920,1280");
			// setear driver y retornarlo para su uso en resto de clases
			// si es modo headless, agregar las opciones como parámetro al ChromeDriver
			return new ChromeDriver(options);
		}
	}

	/**
	 * Es necesario pasar el driver dado que en el metodo anterior solo se crea,
	 * aquí se opera con él
	 * 
	 * @param driver
	 *            => driver necesario para maximizarlo
	 * 
	 */
	public void maximizar(WebDriver driver) {
		// maximizar ventana del navegador
		driver.manage().window().maximize();
	}

	public WebDriverWait setearWait(WebDriver driver, int tiempo) {
		// Clase que permite control de tiempos de espera para cada elemento
		// parametros, driver y tiempo máximo de espera en segundos
		return new WebDriverWait(driver, tiempo);
	}

	/**
	 * Crea una captura de pantalla del driver es decir, solo lo que ves en
	 * pantalla. Si quieres de toda la página, se haría AsHot library
	 * 
	 * @param driver
	 * @param path
	 * @param name
	 */
	public void takeScreenshot(WebDriver driver, String name) {
		try {
			File f = ((TakesScreenshot) driver).getScreenshotAs(OutputType.FILE);
			FileHandler.copy(f, new File(this.rutaEvidencias + "/" + name + ".png"));
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	/**
	 * Metodo para escribir el reporte en un fichero
	 * 
	 * @param nivel
	 * @param result
	 * @param mensaje
	 */
	public void writeReport(String nivel, String result, String mensaje, WebDriver driver, String name) {
		File f = new File(this.rutaEvidencias + "/report.txt");
		try {
			takeScreenshot(driver, name);
			Calendar c = Calendar.getInstance();
			String fecha = c.get(Calendar.DAY_OF_MONTH) + "/" + (c.get(Calendar.MONTH) + 1) + "/"
					+ c.get(Calendar.YEAR);
			String m;
			String s;
			if (c.get(Calendar.MINUTE) < 10) {
				m = "0" + c.get(Calendar.MINUTE);
			} else {
				m = String.valueOf(c.get(Calendar.MINUTE));
			}
			if (c.get(Calendar.SECOND) < 10) {
				s = "0" + c.get(Calendar.SECOND);
			} else {
				s = String.valueOf(c.get(Calendar.SECOND));
			}

			fecha += " " + c.get(Calendar.HOUR_OF_DAY) + ":" + m + ":" + s;
			fecha = "[" + fecha + "]";
			String traza = fecha + " - " + nivel + " - " + result + " - " + mensaje;
			FileWriter fw = new FileWriter(f, true);
			PrintWriter pw = new PrintWriter(fw);
			pw.println(traza);
			pw.close();
			fw.close();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	/**
	 * Metodo para crear un directorio
	 */
	public void createFolderTest() {
		File f = new File(this.rutaEvidencias);
		if (!f.exists()) {
			f.mkdir();
		}
	}

	/**
	 * Metodo para actualizar la ruta de evidencias o bien borrar el contenido para
	 * sobreescribir
	 * 
	 * @param sobreescribir
	 * @return
	 */
	public String rewrite(String sobreescribir) {
		String currentpath = this.rutaEvidencias;
		if (sobreescribir.equalsIgnoreCase("no")) {
			Calendar c = Calendar.getInstance();
			String fecha = c.get(Calendar.DAY_OF_MONTH) + "-" + (c.get(Calendar.MONTH) + 1) + "-"
					+ c.get(Calendar.YEAR);
			String m;
			String s;
			if (c.get(Calendar.MINUTE) < 10) {
				m = "0" + c.get(Calendar.MINUTE);
			} else {
				m = String.valueOf(c.get(Calendar.MINUTE));
			}
			if (c.get(Calendar.SECOND) < 10) {
				s = "0" + c.get(Calendar.SECOND);
			} else {
				s = String.valueOf(c.get(Calendar.SECOND));
			}

			fecha += " " + c.get(Calendar.HOUR_OF_DAY) + "-" + m + "-" + s;
			currentpath += "/" + fecha;
		} else {
			File f = new File(this.rutaEvidencias);
			if (f.exists()) {
				if (f.list().length > 0) {
					for (String filename : f.list()) {
						File deleted = new File(f, filename);
						deleted.delete();
					}
				}
			}
		}

		return currentpath;
	}

	public void createExcelReport() {
		String[] columns = { "Nombre del Test", "Resultado" };
		Workbook workbook = new XSSFWorkbook();
		Sheet sheet = workbook.createSheet("Testing");
		Row headerRow = sheet.createRow(0);

		for (int i = 0; i < columns.length; i++) {
			Cell cell = headerRow.createCell(i);
			cell.setCellValue(columns[i]);
		}

		for (int i = 0; i < columns.length; i++) {
			sheet.autoSizeColumn(i);
		}

		// Write the output to a file
		FileOutputStream fileOut;
		try {
			Calendar c = Calendar.getInstance();
			String fecha = c.get(Calendar.DAY_OF_MONTH) + "-" + (c.get(Calendar.MONTH) + 1) + "-"
					+ c.get(Calendar.YEAR);
			String currentpath = this.rutaEvidencias;
			currentpath += "/Reporte_" + fecha;
			fileOut = new FileOutputStream(currentpath+".xlsx");
			workbook.write(fileOut);
			fileOut.flush();
			fileOut.close();
			// Closing the workbook
			workbook.close();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public void writeExcelReport(String texto, String resultado, int pos, String path) {
		try {
			Calendar c = Calendar.getInstance();
			String fecha = c.get(Calendar.DAY_OF_MONTH) + "-" + (c.get(Calendar.MONTH) + 1) + "-"
					+ c.get(Calendar.YEAR);
			String currentpath = path;
			currentpath += "/Reporte_" + fecha+".xlsx";
			Workbook workbook = WorkbookFactory.create(new File(currentpath));
			Sheet sheet = workbook.getSheetAt(0);
			Row row = sheet.createRow(pos);
			Cell cell = row.createCell(0);
			cell.setCellValue(texto);
			cell = row.createCell(1);
			cell.setCellValue(resultado);

			FileOutputStream fileOut = new FileOutputStream(currentpath+".temp");
			workbook.write(fileOut);
			fileOut.close();
			workbook.close();
			Files.delete(Paths.get(currentpath));
			Files.move(Paths.get(currentpath + ".temp"), Paths.get(currentpath));

			// Closing the workbook

		} catch (EncryptedDocumentException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}
