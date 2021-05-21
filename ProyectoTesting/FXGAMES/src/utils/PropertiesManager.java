package utils;

import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.Properties;

public class PropertiesManager {

	public String url;
	public String rutaEvidencias;
	public String navegador;
	public int tiempo;
	public String headless;
	public String sobreescribir;
	
	public void readProperies() {
		Properties p = new Properties();
		try {
			p.load(new FileReader("config.properties"));
			this.url = p.getProperty("url");
			this.rutaEvidencias = p.getProperty("rutaEvidencias");
			this.navegador = p.getProperty("navegador");
			this.tiempo = Integer.parseInt(p.getProperty("tiempoMax"));
			this.headless = p.getProperty("headless");
			this.sobreescribir = p.getProperty("sobreescribir");
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
}
